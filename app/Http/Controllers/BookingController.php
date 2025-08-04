<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

        return view('Manager.ManagerBookings', compact('bookings', 'vehicleNumbers', 'fullNames', 'statuses'));
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
        ]);

        // Use only validated data
        $validated = $request->except(['driving_photos', 'nic_photos', 'deposit_img', 'grnt_nic']);

        // Set default values for optional monetary fields
        $validated['additional_chagers'] = $request->input('additional_chagers', 0.00);
        $validated['discount_price'] = $request->input('discount_price', 0.00);
        $validated['payed'] = $request->input('payed', 0.00);

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
        }        $validated['days'] = $days;

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



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'nullable',
    //         'full_name' => 'required|string|max:255',
    //         'mobile_number' => 'required',
    //         'nic' => 'nullable|string|max:20',
    //         'address' => 'nullable|string',
    //         'deposit' => 'nullable',
    //         'booking_time' => 'required',
    //         'arrival_time' => 'required',
    //         'price_per_day' => 'required|numeric',
    //         'vehicle_number' => 'required',
    //         'fuel_type' => 'nullable',
    //         'vehicle_name' => 'required',
    //         'from_date' => 'required|date',
    //         'to_date' => 'required|date',
    //         'officer' => 'nullable|string',
    //         'reason' => 'nullable|string',
    //         'method' => 'nullable|string',
    //         'guarantor' => 'nullable|string',
    //         'extra_km_chg' => 'nullable|string',
    //         'free_km' => 'nullable|string',
    //         'free_kmd' => 'nullable|string',
    //         'start_km' => 'nullable|string',
    //         'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'deposit_img.*' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'grnt_nic.*' => 'nullable|file|mimes:jpg,jpeg,png',
    //         'status' => 'nullable',
    //     ]);

    //     $validated = $request->except(['driving_photos', 'nic_photos', 'deposit_img', 'grnt_nic']);
    //     $validated['additional_chagers'] = $request->input('additional_chagers', 0.00);
    //     $validated['discount_price'] = $request->input('discount_price', 0.00);

    //     $from = new \DateTime($request->from_date . ' ' . $request->booking_time);
    //     $to = new \DateTime($request->to_date . ' ' . $request->arrival_time);
    //     $days = ceil(($from->diff($to)->days * 24 + $from->diff($to)->h) / 24);

    //     $validated['days'] = $days;
    //     $validated['price'] = ($request->price_per_day * $days) + $validated['additional_chagers'] - $validated['discount_price'] - $request->input('payed', 0);
    //     $validated['business_id'] = Auth::user()->business_id;

    //     $booking = Booking::create($validated);

    //     $booking->driving_photos = $request->hasFile('driving_photos') ? $this->uploadAndCopy($request->file('driving_photos'), 'driving_photos') : [];
    //     $booking->nic_photos     = $request->hasFile('nic_photos')     ? $this->uploadAndCopy($request->file('nic_photos'), 'nic_photos')         : [];
    //     $booking->deposit_img    = $request->hasFile('deposit_img')    ? $this->uploadAndCopy($request->file('deposit_img'), 'deposit_img')       : [];
    //     $booking->grnt_nic       = $request->hasFile('grnt_nic')       ? $this->uploadAndCopy($request->file('grnt_nic'), 'grnt_nic')             : [];
    //     $booking->save();

    //     if (!empty($request->nic) && !Customer::where('nic', $request->nic)->exists()) {
    //         Customer::create([
    //             'title' => $request->title,
    //             'full_name' => $request->full_name,
    //             'phone' => $request->mobile_number,
    //             'nic' => $request->nic,
    //             'address' => $request->address,
    //             'business_id' => $validated['business_id'],
    //         ]);
    //     }

    //     return redirect()->route('bookings.show', ['id' => $booking->id])
    //         ->with('success', 'Booking created successfully.');
    // }

    
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
        return view('Manager.EditBooking', compact('booking'));
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
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['additional_chagers'] = $validatedData['additional_chagers'] ?? 0.00;
        $validatedData['discount_price'] = $validatedData['discount_price'] ?? 0.00;

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
}
