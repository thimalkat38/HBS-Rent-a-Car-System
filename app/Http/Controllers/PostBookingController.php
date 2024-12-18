<?php

namespace App\Http\Controllers;

use App\Models\PostBooking;
use App\Models\Booking;
use Illuminate\Http\Request;

class PostBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postBookings = PostBooking::all();
        return view('postbookings.index', compact('postBookings'));
    }
    public function create()
    {
        return view('Manager.PostBooking');
    }
    /**
     * Show the form for creating a new resource.
     */
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
            'base_price' => 'nullable|string',
            'after_additional' => 'nullable|string',
            'reason' => 'nullable|string',
            'after_discount' => 'nullable|string',
            'paid' => 'nullable|string',
            'due' => 'nullable|string',
            'total_income' => 'nullable|string',
            'due_paid' => 'nullable|boolean',
            'deposit_refunded' => 'nullable|boolean',
            'vehicle_checked' => 'nullable|boolean',
        ]);
    
        PostBooking::create($validated);

        $booking = Booking::find($request->id); // Assuming `id` is passed in the form
    $booking->update(['status' => 'Completed']);
    
        return redirect()->route('bookings.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(PostBooking $postBooking)
    {
        return view('postbookings.show', compact('postBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostBooking $postBooking)
    {
        return view('postbookings.edit', compact('postBooking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostBooking $postBooking)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string',
            'nic' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'vehicle_number' => 'nullable|string',
            'vehicle' => 'nullable|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'base_price' => 'nullable|string',
            'after_additional' => 'nullable|string',
            'reason' => 'nullable|string',
            'after_discount' => 'nullable|string',
            'paid' => 'nullable|string',
            'due' => 'nullable|string',
            'total_income' => 'nullable|string',
            'due_paid' => 'nullable|boolean',
            'deposit_refunded' => 'nullable|boolean',
            'vehicle_checked' => 'nullable|boolean',
        ]);

        $postBooking->update($validated);

        return redirect()->route('postbookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostBooking $postBooking)
    {
        $postBooking->delete();

        return redirect()->route('postbookings.index')->with('success', 'Booking deleted successfully.');
    }
}