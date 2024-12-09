<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    // Display all bookings
    public function index(Request $request)
    {
        $query = Booking::query();
    
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
            $query->where('id', $request->input('id')); // Exact match for ID
        }
    
        $bookings = $query->orderBy('created_at', 'desc')->get();
    
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
        $request->validate([
            'title' => 'required',
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required',
            'nic' => 'required|string|max:20',
            'booking_time' => 'required',
            'arrival_time' => 'required',
            'price_per_day' => 'required|numeric',
            'vehicle_number' => 'required',
            'fuel_type' => 'required',
            'vehicle_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'reason' => 'nullable|string',
            'driving_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'nic_photos.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);
    
        // Calculate days and total price
        $fromDateTime = new \DateTime($request->input('from_date') . ' ' . $request->input('booking_time'));
        $toDateTime = new \DateTime($request->input('to_date') . ' ' . $request->input('arrival_time'));
        $interval = $fromDateTime->diff($toDateTime);
        $days = ceil(($interval->days * 24 + $interval->h) / 24);
        $pricePerDay = $request->input('price_per_day');
        $additionalCharges = $request->input('additional_chagers') ?? 0;
        $discountPrice = $request->input('discount_price') ?? 0;
        $payed = $request->input('payed') ?? 0;
        $totalPrice = ($pricePerDay * $days) + $additionalCharges - $discountPrice - $payed;
    
        $request->merge(['days' => $days, 'price' => $totalPrice]);
    
        // Save booking data
        $booking = new Booking($request->except(['driving_photos', 'nic_photos']));
    
        // Handle file uploads
        $booking->driving_photos = $request->hasFile('driving_photos') 
            ? $this->uploadFiles($request->file('driving_photos'), 'driving_photos') 
            : [];
        $booking->nic_photos = $request->hasFile('nic_photos') 
            ? $this->uploadFiles($request->file('nic_photos'), 'nic_photos') 
            : [];
    
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
            'nic' => 'required|string|max:20',
            'booking_time' => 'required',
            'arrival_time' => 'required',
            // 'price_per_day' =>'required',
            // 'days' =>'required',
            'vehicle_number' => 'nullable',
            'fuel_type' => 'nullable',
            'vehicle_name' => 'nullable',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            // 'discount_price' =>'required',
            // 'additional_chagers' =>'required',
            'payed' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            // 'reason' => 'required',
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

    

public function calendarView()
{
    // Get the current month and year for the calendar
    $currentMonth = request()->input('month', now()->month);
    $currentYear = request()->input('year', now()->year);

    // Calculate the start and end of the selected month
    $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
    $endDate = $startDate->copy()->endOfMonth();

    // Fetch bookings grouped by day
    $bookingCounts = Booking::whereBetween('from_date', [$startDate, $endDate])
        ->selectRaw('DATE(from_date) as date, COUNT(*) as count')
        ->groupBy('date')
        ->pluck('count', 'date');

    // Pass data to the calendar view
    return view('Manager.ManagerDashboard', compact('bookingCounts', 'currentMonth', 'currentYear'));
}

}
