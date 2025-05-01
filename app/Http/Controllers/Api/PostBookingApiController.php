<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostBooking;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class PostBookingApiController extends Controller
{
    // Controller Method for index
    public function index(Request $request)
    {
        // Get the query parameters
        $vehicleNumber = $request->input('vehicle_number');
        $fromDate = $request->input('from_date');
        $order = $request->input('order');

        // Start building the query with business_id scoping
        $query = PostBooking::where('business_id', Auth::user()->business_id);

        // Apply filters
        if ($vehicleNumber) {
            $query->where('vehicle_number', 'like', "%$vehicleNumber%");
        }

        if ($fromDate) {
            $query->whereDate('from_date', '>=', $fromDate);
        }

        // Determine pagination based on order
        if ($order) {
            [$start, $end] = explode('-', $order);
            $query->skip((int) $start - 1)->take((int) $end - (int) $start + 1);
        }

        // Get the filtered results, ordered by latest first
        $postBookings = $query->latest()->get();

        // Return JSON response
        return response()->json($postBookings);
    }


    // Controller Method for store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string',
            'nic' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'vehicle_number' => 'nullable|string',
            'vehicle' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'ar_date' => 'nullable|date',
            'price_per_day' => 'nullable|string',
            'ex_date' => 'nullable|string',
            'base_price' => 'nullable|string',
            'extra_km' => 'nullable|string',
            'extra_hours' => 'nullable|string',
            'damage_fee' => 'nullable|string',
            'after_additional' => 'nullable|string',
            'reason' => 'nullable|string',
            'after_discount' => 'nullable|string',
            'paid' => 'nullable|string',
            'due' => 'nullable|string',
            'total_income' => 'nullable|string',
            'due_paid' => 'nullable|boolean',
            'deposit_refunded' => 'nullable|boolean',
            'vehicle_checked' => 'nullable|boolean',
            'officer' => 'nullable|string',
            'rel_officer' => 'nullable|string',
            'agn' => 'nullable|string',
            'start_km' => 'nullable|string',
            'end_km' => 'nullable|string',
            'free_km' => 'nullable|string',
            'over' => 'nullable|string',
            'extra_km_chg' => 'nullable|string',
        ]);

        // Inject current user's business_id
        $validated['business_id'] = Auth::user()->business_id;

        $postBooking = PostBooking::create($validated);

        $booking = Booking::find($request->id);

        if ($booking) {
            $booking->update(['status' => 'Completed']);
            $booking->delete(); // Optional: keep if you want to remove from active bookings
        }

        return response()->json($postBooking, 201);
    }


    // Controller Method for show
    public function show(PostBooking $postBooking)
    {
        return response()->json($postBooking);
    }
}
