<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    // Display all bookings
    public function index(Request $request)
    {
        $search = $request->input('search');

        // If a search query exists, filter bookings by V/NUMBER
        if ($search) {
            $bookings = Booking::where('mobile_number', 'LIKE', "%{$search}%")->get();
        } else {
            // If no search query, return all bookings
            $bookings = Booking::all();
        }

        return view('Manager.ManagerBookings', compact('bookings'));
    }

    // Show form to create a new booking
    public function create()
    {
        return view('bookings.create');
    }

    // Store new booking data and redirect to DetailedBooking.blade.php
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'booking_time' => 'required',
            'arrival_time' => 'required',
            'price_per_day' => 'required',
            'days' => 'required',
            'vehicle_number' => 'required',
            'fuel_type' => 'required',
            'vehicle_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'discount_price' => 'nullable|numeric',
            'additional_chagers' => 'nullable|numeric',
            'payed' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'reason' => 'required',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);
    
        // Calculate the total price in PHP to ensure the correct value is stored
        $pricePerDay = $request->input('price_per_day');
        $additionalCharges = $request->input('additional_chagers') ?? 0;
        $discountPrice = $request->input('discount_price') ?? 0;
        $payed = $request->input('payed') ?? 0;
    
        // Combine dates and times for accurate calculations
        $fromDateTime = new \DateTime($request->input('from_date') . ' ' . $request->input('booking_time'));
        $toDateTime = new \DateTime($request->input('to_date') . ' ' . $request->input('arrival_time'));
    
        $interval = $fromDateTime->diff($toDateTime);
        $days = ceil(($interval->days * 24 + $interval->h) / 24); // Convert hours to days (24h = 1 day)
    
        $totalPrice = ($pricePerDay * $days) + $additionalCharges - $discountPrice - $payed;
    
        // Store the booking data
        $booking = new Booking([
            'title' => $request->input('title'),
            'full_name' => $request->input('full_name'),
            'mobile_number' => $request->input('mobile_number'),
            'booking_time' => $request->input('booking_time'),
            'arrival_time' => $request->input('arrival_time'),
            'price_per_day' =>$request->input('price_per_day'),
            'days' => $request->input('days'),
            'vehicle_number' => $request->input('vehicle_number'),
            'fuel_type' => $request->input('fuel_type'),
            'vehicle_name' => $request->input('vehicle_name'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'discount_price' => $discountPrice,
            'additional_chagers' => $additionalCharges,
            'payed' => $payed,
            'price' => $totalPrice, // Save the calculated total price
            'reason' => $request->input('reason'),
        ]);
    
        // Handle file uploads
        if ($request->hasFile('driving_photos')) {
            $booking->driving_photos = $this->uploadFiles($request->file('driving_photos'), 'driving_photos');
        }
    
        if ($request->hasFile('nic_photos')) {
            $booking->nic_photos = $this->uploadFiles($request->file('nic_photos'), 'nic_photos');
        }
    
        // Save the booking
        $booking->save();
    
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

        // Show a specific booking
        public function show($id)
        {
            // Fetch the specific booking using the ID
            $booking = Booking::findOrFail($id);
    
            // Fetch the customer information based on the booking's full_name
            $customer = Customer::where('full_name', $booking->full_name)->first();
    
            // Pass both booking and customer data to the view
            return view('Manager.DetailedBooking', compact('booking', 'customer'));
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
            'booking_time' => 'required',
            'arrival_time' => 'required',
            'price_per_day' =>'required',
            'days' =>'required',
            'vehicle_number' => 'nullable',
            'fuel_type' => 'nullable',
            'vehicle_name' => 'nullable',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'discount_price' =>'required',
            'additional_chagers' =>'required',
            'payed' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'reason' => 'required',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        // Update basic details
        $booking->update($validatedData);

        // Handling Driving Photos (if new ones are uploaded)
        if ($request->hasFile('driving_photos')) {
            // Remove old photos if new ones are uploaded
            if (!empty($booking->driving_photos)) {
                foreach ($booking->driving_photos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto); // Delete old photos
                }
            }

            $drivingPhotos = [];
            foreach ($request->file('driving_photos') as $photo) {
                $path = $photo->store('driving_photos', 'public'); // Store new photo
                $drivingPhotos[] = $path;
            }
            $booking->driving_photos = $drivingPhotos; // Update with new photos
        }

        // Handling NIC Photos (if new ones are uploaded)
        if ($request->hasFile('nic_photos')) {
            // Remove old NIC photos if new ones are uploaded
            if (!empty($booking->nic_photos)) {
                foreach ($booking->nic_photos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto); // Delete old photos
                }
            }

            $nicPhotos = [];
            foreach ($request->file('nic_photos') as $photo) {
                $path = $photo->store('nic_photos', 'public'); // Store new photo
                $nicPhotos[] = $path;
            }
            $booking->nic_photos = $nicPhotos; // Update with new photos
        }

        // Save changes
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Delete a booking
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
