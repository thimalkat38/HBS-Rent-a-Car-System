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
            'vehicle_number' => 'required',
            'fuel_type' => 'required',
            'vehicle_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'price' => 'nullable|numeric',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        // Calculate the total price
        $pricePerDay = $request->input('price_per_day');
        $additionalCharges = $request->input('additional_chagers') ?? 0;
        $fromDate = new \DateTime($request->input('from_date'));
        $toDate = new \DateTime($request->input('to_date'));
        $days = $fromDate->diff($toDate)->days + 1; // Add 1 to include the start day
        $totalPrice = ($pricePerDay * $days) + $additionalCharges;

        // Store the booking data
        $booking = new Booking([
            'title' => $request->input('title'),
            'full_name' => $request->input('full_name'),
            'mobile_number' => $request->input('mobile_number'),
            'booking_time' => $request->input('booking_time'),
            'vehicle_number' => $request->input('vehicle_number'),
            'fuel_type' => $request->input('fuel_type'),
            'vehicle_name' => $request->input('vehicle_name'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'price' => $totalPrice, // Save the calculated total price
        ]);

        // Handle file uploads
        $drivingPhotos = [];
        if ($request->hasFile('driving_photos')) {
            foreach ($request->file('driving_photos') as $photo) {
                $path = $photo->store('driving_photos', 'public');
                $drivingPhotos[] = $path;
            }
            $booking->driving_photos = $drivingPhotos;
        }

        $nicPhotos = [];
        if ($request->hasFile('nic_photos')) {
            foreach ($request->file('nic_photos') as $photo) {
                $path = $photo->store('nic_photos', 'public');
                $nicPhotos[] = $path;
            }
            $booking->nic_photos = $nicPhotos;
        }

        // Save the booking
        $booking->save();

        // Redirect to the detailed booking view after storing
        return redirect()->route('bookings.show', ['id' => $booking->id]);
    }

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
            'vehicle_number' => 'nullable',
            'fuel_type' => 'nullable',
            'vehicle_name' => 'nullable',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'price' => 'nullable|numeric',
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
