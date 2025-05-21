<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingApiController extends Controller
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

        return response()->json($bookings);
    }

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
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:20000',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:20000',
            'deposit_img.*' => 'nullable|file|mimes:jpg,jpeg,png|max:20000',
            'grnt_nic.*' => 'nullable|file|mimes:jpg,jpeg,png|max:20000',
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
        $this->copyStorageToPublic();

        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking
        ]);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        // Fetch the customer information based on the booking's full_name
        $customer = Customer::where('full_name', $booking->full_name)->first();

        return response()->json([
            'booking' => $booking,
            'customer' => $customer
        ]);
    }

    public function postBooking($id)
    {
        $booking = Booking::findOrFail($id);

        return response()->json($booking);
    }

    // Helper function for file upload
    private function uploadFiles($files, $folder)
    {
        $uploadedFiles = [];
        foreach ($files as $file) {
            // Store in 'public' disk, which maps to storage/app/public
            $path = $file->store($folder, 'public');

            // Store the relative path (e.g., driving_photos/filename.jpg)
            $uploadedFiles[] = $path;
        }
        return $uploadedFiles;
    }




    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'nic' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'deposit' => 'nullable|string',
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
            'price' => 'nullable|string',
            'discount_price' => 'nullable|string',
            'additional_chagers' => 'nullable|string',
            'reason' => 'nullable|string',
            'start_km' => 'nullable|string',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedData['additional_chagers'] = $validatedData['additional_chagers'] ?? 0.00;
        $validatedData['discount_price'] = $validatedData['discount_price'] ?? 0.00;

        $booking->update($validatedData);

        // Driving photos
        if ($request->hasFile('driving_photos')) {
            if ($booking->driving_photos) {
                foreach ($booking->driving_photos as $old) {
                    Storage::disk('public')->delete($old);
                }
            }

            $photos = [];
            foreach ($request->file('driving_photos') as $file) {
                $photos[] = $file->store('driving_photos', 'public');
            }
            $booking->driving_photos = $photos;
        }

        // NIC photos
        if ($request->hasFile('nic_photos')) {
            if ($booking->nic_photos) {
                foreach ($booking->nic_photos as $old) {
                    Storage::disk('public')->delete($old);
                }
            }

            $nicPhotos = [];
            foreach ($request->file('nic_photos') as $file) {
                $nicPhotos[] = $file->store('nic_photos', 'public');
            }
            $booking->nic_photos = $nicPhotos;
        }

        $booking->save();
        $this->copyStorageToPublic();

        return response()->json([
            'message' => 'Booking updated successfully.',
            'booking' => $booking
        ]);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json([
            'message' => 'Booking deleted successfully.'
        ]);
    }

    private function copyStorageToPublic()
    {
        $source = storage_path('app/public');
        $destination = public_path('storage');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $this->recursiveCopy($source, $destination);
    }

    private function recursiveCopy($source, $destination)
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
                    $this->recursiveCopy($srcFile, $destFile);
                } else {
                    copy($srcFile, $destFile);
                }
            }
        }

        closedir($directory);
    }
}
