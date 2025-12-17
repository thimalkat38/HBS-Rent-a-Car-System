<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\PostBooking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Booking::where('business_id', $businessId); // scope to current business

        if ($request->filled('mobile_number')) {
            $query->where('mobile_number', 'LIKE', "%" . $request->input('mobile_number') . "%");
        }

        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', "%" . $request->input('full_name') . "%");
        }

        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', "%" . $request->input('vehicle_number') . "%");
        }

        if ($request->filled('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('from_date')) {
            $query->whereDate('from_date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->whereDate('from_date', '<=', $request->input('to_date'));
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();

        // Scope dropdown values to current business
        $vehicleNumbers = Booking::where('business_id', $businessId)->select('vehicle_number')->distinct()->pluck('vehicle_number');
        $fullNames = Booking::where('business_id', $businessId)->select('full_name')->distinct()->pluck('full_name');
        $statuses = Booking::where('business_id', $businessId)->select('status')->distinct()->pluck('status');

        return view('Manager.BookingHistory', compact('bookings', 'vehicleNumbers', 'fullNames', 'statuses'));
    }







    // Show form to create a new booking
    public function create()
    {
        return view('bookings.create');
    }

    // Store new booking data and redirect to DetailedBooking.blade.php
    // Improved version of the store() method with bad practices corrected

    public function store(Request $request)
    {
        // Add 'payed' to validation rules and ensure numeric types for monetary fields
        $request->validate([
            'title' => 'nullable',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'nic' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'deposit' => 'nullable',
            'booking_time' => 'required',
            'arrival_time' => 'required',
            'price_per_day' => 'required|numeric',
            'vehicle_number' => 'required',
            'fuel_type' => 'nullable',
            'vehicle_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'officer' => 'nullable|string',
            'commission' => 'nullable|string',
            'commission_amt' => 'nullable|numeric',
            'commission2' => 'nullable|string',
            'commission_amt2' => 'nullable|numeric',
            'driver_name' => 'nullable|string',
            'location' => 'nullable|string',
            'driver_commission_amt' => 'nullable|numeric',
            'hand_over_booking' => 'sometimes|in:0,1',
            'reason' => 'nullable|string',
            'method' => 'nullable|string',
            'guarantor' => 'nullable|string',
            'extra_km_chg' => 'nullable|numeric',
            'free_km' => 'nullable|numeric',
            'free_kmd' => 'nullable|numeric',
            'start_km' => 'nullable|numeric',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'deposit_img.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'grnt_nic.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'nullable',
            'additional_chagers' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'payed' => 'nullable|numeric',
            'commissioner' => 'nullable|string',
        ]);

        // Use only validated data
        $validated = $request->except(['driving_photos', 'nic_photos', 'deposit_img', 'grnt_nic']);

        // Set default values for optional monetary fields
        $validated['additional_chagers'] = $request->input('additional_chagers', 0.00);
        $validated['discount_price'] = $request->input('discount_price', 0.00);
        $validated['payed'] = $request->input('payed', 0.00);

        // Map commissioner field to commission for the model
        if (isset($validated['commissioner'])) {
            $validated['commission'] = $validated['commissioner'];
            unset($validated['commissioner']);
        }

        // Normalize checkbox to boolean
        $validated['hand_over_booking'] = $request->boolean('hand_over_booking');

        // Calculate days (always round up if there is any time difference)
        $from = new \DateTime($request->from_date . ' ' . $request->booking_time);
        $to = new \DateTime($request->to_date . ' ' . $request->arrival_time);
        $interval = $from->diff($to);
        $days = $interval->days;
        if ($interval->h > 0 || $interval->i > 0 || $interval->s > 0) {
            $days++;
        }
        if ($days < 1) {
            $days = 1;
        }
        $validated['days'] = $days;

        // Calculate price and ensure it is not negative
        $total = ($request->price_per_day * $days) + $validated['additional_chagers'];
        $total -= ($validated['discount_price'] + $validated['payed']);
        $validated['price'] = max(0, $total);

        // Ensure user is authenticated
        if (!\Illuminate\Support\Facades\Auth::check()) {
            \Illuminate\Support\Facades\DB::rollBack();
            return redirect()->back()->withErrors(['auth' => 'You must be logged in to create a booking.']);
        }
        $validated['business_id'] = \Illuminate\Support\Facades\Auth::user()->business_id;

        // Use a transaction to ensure atomicity
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $booking = Booking::create($validated);

            // Handle file uploads (assumes model casts to array/JSON)
            $booking->driving_photos = $request->hasFile('driving_photos') ? $this->uploadAndCopy($request->file('driving_photos'), 'driving_photos') : [];
            $booking->nic_photos     = $request->hasFile('nic_photos')     ? $this->uploadAndCopy($request->file('nic_photos'), 'nic_photos')         : [];
            $booking->deposit_img    = $request->hasFile('deposit_img')    ? $this->uploadAndCopy($request->file('deposit_img'), 'deposit_img')       : [];
            $booking->grnt_nic       = $request->hasFile('grnt_nic')       ? $this->uploadAndCopy($request->file('grnt_nic'), 'grnt_nic')             : [];
            $booking->save();

            // Use firstOrCreate to avoid race conditions and duplicates
            if (!empty($request->nic)) {
                Customer::firstOrCreate(
                    ['nic' => $request->nic],
                    [
                        'title' => $request->title,
                        'full_name' => $request->full_name,
                        'phone' => $request->mobile_number,
                        'address' => $request->address,
                        'business_id' => $validated['business_id'],
                    ]
                );
            }

            \Illuminate\Support\Facades\DB::commit();
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to create booking: ' . $e->getMessage()]);
        }

        return redirect()->route('bookings.show', ['id' => $booking->id])
            ->with('success', 'Booking created successfully.');
    }

    private function uploadAndCopy($files, $directory)
    {
        $paths = [];

        foreach ($files as $file) {
            $path = $file->store($directory, 'public'); // stored in storage/app/public
            $paths[] = $path;

            // Copy to public/storage manually
            $source = storage_path('app/public/' . $path);
            $destination = public_path('storage/' . $path);

            if (!file_exists(dirname($destination))) {
                mkdir(dirname($destination), 0777, true);
            }

            copy($source, $destination);
        }

        return $paths;
    }



    // Show a specific booking
    public function show($id)
    {
        // Fetch the specific booking using the ID
        $booking = Booking::findOrFail($id);

        // Fetch the customer information based on the booking's full_name
        $customer = Customer::where('full_name', $booking->full_name)->first();

        // ✅ Fetch the full business record
        $business = \App\Models\Business::find(Auth::user()->business_id);

        // Pass all to the view
        return view('Manager.DetailedBooking', compact('booking', 'customer', 'business'));
    }



    // Show form to edit a booking
    public function edit(Booking $booking)
    {
        return view('Manager.NewEditBookings', compact('booking'));
    }

    // Update booking data
    public function update(Request $request, Booking $booking)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'nic' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'deposit' => 'nullable',
            'booking_time' => 'required',
            'arrival_time' => 'required',
            'vehicle_number' => 'nullable',
            'fuel_type' => 'nullable',
            'vehicle_name' => 'nullable',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'officer' => 'nullable|string',
            'commission' => 'nullable|string',
            'commission_amt' => 'nullable|numeric',
            'commission2' => 'nullable|string',
            'commission_amt2' => 'nullable|numeric',
            'driver_name' => 'nullable|string',
            'location' => 'nullable|string',
            'driver_commission_amt' => 'nullable|numeric',
            'hand_over_booking' => 'sometimes|in:0,1',
            'method' => 'nullable|string',
            'guarantor' => 'nullable|string',
            'payed' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|string',
            'additional_chagers' => 'nullable|string',
            'price' => 'nullable|string',
            'deposit' => 'nullable|string',
            'reason' => 'nullable|string',
            'start_km' => 'nullable|string',
            'free_km' => 'nullable|string',
            'commissioner' => 'nullable|string',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['additional_chagers'] = $validatedData['additional_chagers'] ?? 0.00;
        $validatedData['discount_price'] = $validatedData['discount_price'] ?? 0.00;

        // Map commissioner field to commission for the model
        if (isset($validatedData['commissioner'])) {
            $validatedData['commission'] = $validatedData['commissioner'];
            unset($validatedData['commissioner']);
        }

        // Normalize checkbox to boolean
        $validatedData['hand_over_booking'] = $request->boolean('hand_over_booking');

        // Update basic details
        $booking->update($validatedData);

        // Handling Driving Photos (if new ones are uploaded)
        if ($request->hasFile('driving_photos')) {
            // Delete old photos
            if ($booking->driving_photos) {
                foreach ($booking->driving_photos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }

            // Store new photos
            $drivingPhotos = [];
            foreach ($request->file('driving_photos') as $photo) {
                $path = $photo->store('driving_photos', 'public');
                $drivingPhotos[] = $path;
            }
            $booking->driving_photos = $drivingPhotos;
        }

        // Handling NIC Photos (if new ones are uploaded)
        if ($request->hasFile('nic_photos')) {
            // Delete old photos
            if ($booking->nic_photos) {
                foreach ($booking->nic_photos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }

            // Store new photos
            $nicPhotos = [];
            foreach ($request->file('nic_photos') as $photo) {
                $path = $photo->store('nic_photos', 'public');
                $nicPhotos[] = $path;
            }
            $booking->nic_photos = $nicPhotos;
        }

        // Save JSON fields explicitly
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }


    // Delete a booking
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function postBooking($id)
    {
        // Fetch the booking details using the ID
        $booking = Booking::findOrFail($id);

        // Pass the relevant details to the view
        return view('Manager.NewPostBooking', compact('booking'));
    }

    public function exportCommissionCsv(Request $request)
    {
        $request->validate([
            'officer' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'commission_type' => 'nullable|in:all,normal,driving',
        ]);

        $officer = $request->input('officer');
        $empName = strtolower(trim($officer));
        $start   = Carbon::parse($request->input('start_date'))->startOfDay();
        $end     = Carbon::parse($request->input('end_date'))->endOfDay();
        $type    = $request->input('commission_type', 'all');
        $bizId   = Auth::check() ? Auth::user()->business_id : null;

        // Only query PostBooking
        $query = PostBooking::query()->whereBetween('created_at', [$start, $end]);

        if ($bizId) {
            $query->where('business_id', $bizId);
        }

        // Apply officer/type filter only to postbooking
        if ($type === 'driving') {
            $query->where('hand_over_booking', 1)
                  ->whereRaw('LOWER(TRIM(driver_name)) = ?', [$empName]);
        } elseif ($type === 'normal') {
            $query->where('hand_over_booking', 0)
                  ->where(function ($q) use ($empName) {
                      $q->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])
                        ->orWhereRaw('LOWER(TRIM(commission2)) = ?', [$empName]);
                  });
        } else { // all types
            $query->where(function ($q) use ($empName) {
                $q->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])
                  ->orWhereRaw('LOWER(TRIM(commission2)) = ?', [$empName])
                  ->orWhereRaw('LOWER(TRIM(driver_name)) = ?', [$empName]);
            });
        }

        $selectCols = [
            'id',
            'full_name',
            'hand_over_booking',
            'vehicle_number',
            'from_date',
            'to_date',
            'commission',
            'commission_amt',
            'commission2',
            'commission_amt2',
            'driver_name',
            'driver_commission_amt',
            'created_at',
        ];

        $rows = $query->select(array_merge($selectCols, [DB::raw("'Completed business' as source")]))
                      ->orderByDesc('created_at')
                      ->get();

        $fileName = 'commission_report_' . preg_replace('/\s+/', '_', strtolower($officer)) . '_' . $start->format('Ymd') . '_' . $end->format('Ymd') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($rows, $empName, $type) {
            $out = fopen('php://output', 'w');

            // CSV headings (includes Source)
            fputcsv($out, [
                'Source',
                'ID',
                'Full Name',
                'Hand Over Booking',
                'Vehicle Number',
                'From Date',
                'To Date',
                'Amount',
                // 'Created At',
            ]);
            foreach ($rows as $b) {
                // compute amount based on which role matched
                $amount = 0.0;
                $nameCommission  = strtolower(trim((string) $b->commission));
                $nameCommission2 = strtolower(trim((string) $b->commission2));
                $nameDriver      = strtolower(trim((string) $b->driver_name));

                if ($type === 'driving') {
                    if ($nameDriver === $empName) {
                        $amount = (float) ($b->driver_commission_amt ?? 0);
                    }
                } elseif ($type === 'normal') {
                    if ($nameCommission === $empName) {
                        $amount = (float) ($b->commission_amt ?? 0);
                    } elseif ($nameCommission2 === $empName) {
                        $amount = (float) ($b->commission_amt2 ?? 0);
                    }
                } else { // all
                    if ($nameCommission === $empName) {
                        $amount = (float) ($b->commission_amt ?? 0);
                    } elseif ($nameCommission2 === $empName) {
                        $amount = (float) ($b->commission_amt2 ?? 0);
                    } elseif ($nameDriver === $empName) {
                        $amount = (float) ($b->driver_commission_amt ?? 0);
                    }
                }

                fputcsv($out, [
                    $b->source,
                    $b->id,
                    $b->full_name,
                    $b->hand_over_booking ? 1 : 0,
                    $b->vehicle_number,
                    $b->from_date,
                    $b->to_date,
                    $amount,
                    // optional($b->created_at)->toDateTimeString(),
                ]);
            }

            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
    }
}
