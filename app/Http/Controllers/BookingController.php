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

    public function store(Request $request)
    {
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
            'fuel_type' => 'required',
            'vehicle_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'officer' => 'nullable|string',
            'reason' => 'nullable|string',
            'method' => 'nullable|string',
            'guarantor' => 'nullable|string',
            'extra_km_chg' => 'nullable|string',
            'free_km' => 'nullable|string',
            'free_kmd' => 'nullable|string',
            'start_km' => 'nullable|string',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'deposit_img.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'grnt_nic.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'nullable',
        ]);

        $validatedData = $request->all();
        $validatedData['additional_chagers'] = $validatedData['additional_chagers'] ?? 0.00;
        $validatedData['discount_price'] = $validatedData['discount_price'] ?? 0.00;

        $fromDateTime = new \DateTime($request->input('from_date') . ' ' . $request->input('booking_time'));
        $toDateTime = new \DateTime($request->input('to_date') . ' ' . $request->input('arrival_time'));
        $interval = $fromDateTime->diff($toDateTime);
        $days = ceil(($interval->days * 24 + $interval->h) / 24);

        $totalPrice = ($request->price_per_day * $days)
            + ($request->additional_chagers ?? 0)
            - ($request->discount_price ?? 0)
            - ($request->payed ?? 0);

        $businessId = Auth::user()->business_id;

        $booking = new Booking($request->except(['driving_photos', 'nic_photos', 'deposit_img', 'grnt_nic']));
        $booking->days = $days;
        $booking->price = $totalPrice;
        $booking->business_id = $businessId;

        // Handle file uploads
        $booking->driving_photos = $request->hasFile('driving_photos')
            ? $this->uploadFiles($request->file('driving_photos'), 'driving_photos')
            : [];
        $booking->nic_photos = $request->hasFile('nic_photos')
            ? $this->uploadFiles($request->file('nic_photos'), 'nic_photos')
            : [];
        $booking->deposit_img = $request->hasFile('deposit_img')
            ? $this->uploadFiles($request->file('deposit_img'), 'deposit_img')
            : [];
        $booking->grnt_nic = $request->hasFile('grnt_nic')
            ? $this->uploadFiles($request->file('grnt_nic'), 'grnt_nic')
            : [];

        $booking->save();

        if (!empty($request->nic) && !Customer::where('nic', $request->nic)->exists()) {
            Customer::create([
                'title' => $request->title,
                'full_name' => $request->full_name,
                'phone' => $request->mobile_number,
                'nic' => $request->nic,
                'address' => $request->address,
                'business_id' => $businessId,
            ]);
        }

        // Auto-linking storage to public
        $source = storage_path('app/public');
        $destination = public_path('storage');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        function copyDirectory($source, $destination)
        {
            $directory = opendir($source);
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }
            while (($file = readdir($directory)) !== false) {
                if ($file !== '.' && $file !== '..') {
                    $srcFile = $source . DIRECTORY_SEPARATOR . $file;
                    $destFile = $destination . DIRECTORY_SEPARATOR . $file;
                    if (is_dir($srcFile)) {
                        copyDirectory($srcFile, $destFile);
                    } else {
                        copy($srcFile, $destFile);
                    }
                }
            }
            closedir($directory);
        }
        copyDirectory($source, $destination);

        return redirect()->route('bookings.show', ['id' => $booking->id])
            ->with('success', 'Booking created successfully.');
    }


    /**
     * Helper function to handle file uploads.
     */
    private function uploadFiles($files, $directory)
    {
        $filePaths = [];
        foreach ($files as $file) {
            $path = $file->store($directory, 'public');
            $filePaths[] = $path;
        }
        return $filePaths;
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
        return view('Manager.DetailedBooking', compact('booking', 'customer', '$business'));
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
        return view('Manager.PostBooking', compact('booking'));
    }
}
