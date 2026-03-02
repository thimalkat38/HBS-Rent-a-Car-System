<?php

namespace App\Http\Controllers;

use App\Models\PostBooking;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\PaidOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Get the query parameters
        $vehicleNumber = $request->input('vehicle_number');
        $fromDate      = $request->input('from_date');
        $toDate        = $request->input('to_date');
        $agn           = $request->input('agn');
        $bookingId     = $request->input('booking_id');

        // Start building the query with business_id scoping
        $query = PostBooking::where('business_id', Auth::user()->business_id);

        // Apply text filters
        if (!empty($vehicleNumber)) {
            $query->where('vehicle_number', 'like', "%{$vehicleNumber}%");
        }

        if (!empty($agn)) {
            $query->where('agn', 'like', "%{$agn}%");
        }

        if (!empty($bookingId)) {
            $query->where('booking_id', 'like', "%{$bookingId}%");
        }

        /**
         * DATE FILTER LOGIC
         *
         * 🔹 If both from_date and to_date are given:
         *     -> show ONLY bookings fully inside that range
         *        from_date >= fromDate
         *        to_date   <= toDate
         *
         * 🔹 If only from_date is given:
         *     -> match that exact from_date
         *
         * 🔹 If only to_date is given:
         *     -> match that exact to_date
         */
        if (!empty($fromDate) && !empty($toDate)) {

            // Bookings fully inside the selected period
            $query->whereDate('from_date', '>=', $fromDate)
                ->whereDate('to_date',   '<=', $toDate);
        } elseif (!empty($fromDate)) {

            // Only from_date given -> match bookings starting on that date
            $query->whereDate('from_date', $fromDate);
        } elseif (!empty($toDate)) {

            // Only to_date given -> match bookings ending on that date
            $query->whereDate('to_date', $toDate);
        }

        // Get the filtered results, ordered by latest first
        // (you can change latest() to latest('from_date') if you want by from_date)
        $postBookings   = $query->latest()->get();
        $sumTotalIncome = $postBookings->sum('total_income');

        // Return the view with the filtered results
        return view('Manager.CompletedBus', compact('postBookings', 'sumTotalIncome'));
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
            'booking_id' => 'nullable|string',
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
            'commission' => 'nullable|string',
            'commission_amt' => 'nullable|numeric',
            'commission2' => 'nullable|string',
            'commission_amt2' => 'nullable|numeric',
            'driver_name' => 'nullable|string',
            'driver_commission_amt' => 'nullable|numeric',
            'location' => 'nullable|string',
            'agn' => 'nullable|string',
            'start_km' => 'nullable|string',
            'end_km' => 'nullable|string',
            'drived' => 'nullable|string',
            'free_km' => 'nullable|string',
            'over' => 'nullable|string',
            'extra_km_chg' => 'nullable|string',
            'hand_over_booking' => 'nullable'
        ]);

        // Inject current user's business_id
        $validated['business_id'] = Auth::user()->business_id;

        // Handle checkbox fields - convert to boolean
        $validated['due_paid'] = $request->has('due_paid') ? (bool) $request->due_paid : false;
        $validated['deposit_refunded'] = $request->has('deposit_refunded') ? (bool) $request->deposit_refunded : false;
        $validated['vehicle_checked'] = $request->has('vehicle_checked') ? (bool) $request->vehicle_checked : false;

        $postBooking = PostBooking::create($validated);

        $booking = Booking::find($request->id);

        if ($booking) {
            $booking->update(['status' => 'Completed']);
            $booking->delete(); // Optional: keep if you want to remove from active bookings
        }

        // Update vehicle's current mileage if end_km is provided
        if ($request->filled('end_km') && $request->filled('vehicle_number')) {
            $this->updateVehicleCurrentMileage($request->vehicle_number, $request->end_km);
        }

        return redirect()->route('postbookings.show', $postBooking)
            ->with('success', 'Booking created successfully.');
    }





    /**
     * Display the specified resource.
     */
    public function show(PostBooking $postBooking)
    {
        $business = \App\Models\Business::find(Auth::user()->business_id);

        return view('Manager.DetailedPostBookings', compact('postBooking', 'business'));
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
            'commission' => 'nullable|string',
            'commission_amt' => 'nullable|numeric',
            'commission2' => 'nullable|string',
            'commission_amt2' => 'nullable|numeric',
            'driver_name' => 'nullable|string',
            'driver_commission_amt' => 'nullable|numeric',
            'location' => 'nullable|string',
            'agn' => 'nullable|string',
            'start_km' => 'nullable|string',
            'end_km' => 'nullable|string',
            'drived' => 'nullable|string',
            'free_km' => 'nullable|string',
            'over' => 'nullable|string',
            'extra_km_chg' => 'nullable|string',
        ]);

        // Handle checkbox fields - convert to boolean
        $validated['due_paid'] = $request->has('due_paid') ? (bool) $request->due_paid : false;
        $validated['deposit_refunded'] = $request->has('deposit_refunded') ? (bool) $request->deposit_refunded : false;
        $validated['vehicle_checked'] = $request->has('vehicle_checked') ? (bool) $request->vehicle_checked : false;

        $postBooking->update($validated);

        return redirect()->route('postbookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(PostBooking $postBooking)
    {
        $postBooking->delete();

        return redirect()->route('postbookings.index')->with('success', 'Booking deleted successfully.');
    }

    /**
     * Update vehicle's current mileage based on the latest post-booking end_km
     */
    private function updateVehicleCurrentMileage($vehicleNumber, $endKm)
    {
        try {
            $vehicle = Vehicle::where('vehicle_number', $vehicleNumber)
                ->where('business_id', Auth::user()->business_id)
                ->first();

            if ($vehicle && $endKm) {
                $vehicle->update(['current_mileage' => $endKm]);
            }
        } catch (\Exception $e) {
            // Log the error but don't break the main flow
            Log::error('Failed to update vehicle current mileage: ' . $e->getMessage());
        }
    }

    public function getProfitData(Request $request)
    {
        $request->validate([
            'vehicle_number' => 'required|string',
            'from_date'      => 'nullable|date',
            'to_date'        => 'nullable|date',
        ]);

        $vehicleNumber = $request->vehicle_number;
        $fromDate      = $request->from_date;
        $toDate        = $request->to_date;
        $businessId    = Auth::check() ? Auth::user()->business_id : null;

        // -------------------------
        // 1) INCOME (recognize on to_date ONLY)
        //    Instead of distributing over the range, we group by DATE(to_date).
        // -------------------------
        $incomeMap = PostBooking::query()
            ->where('vehicle_number', $vehicleNumber)
            ->when($businessId, fn($q) => $q->where('business_id', $businessId))
            // Only bookings whose END falls inside the selected range
            ->when($fromDate, fn($q) => $q->whereDate('to_date', '>=', $fromDate))
            ->when($toDate,   fn($q) => $q->whereDate('to_date', '<=', $toDate))
            // If you only want completed bookings, add:
            // ->where('status', 'completed')
            ->selectRaw('DATE(to_date) as date, SUM(total_income) as total')
            ->groupBy('date')
            ->pluck('total', 'date')     // ['YYYY-MM-DD' => 12345.67, ...]
            ->toArray();

        // -------------------------
        // 2) EXPENSES (Fuel + Services + Owner Payments)
        // -------------------------
        $fuelExpenses = Expense::selectRaw('DATE(date) as date, SUM(amnt) as total')
            ->where('fuel_for', $vehicleNumber)
            ->when($businessId, fn($q) => $q->where('business_id', $businessId))
            ->when($fromDate, fn($q) => $q->whereDate('date', '>=', $fromDate))
            ->when($toDate, fn($q) => $q->whereDate('date', '<=', $toDate))
            ->groupBy('date')
            ->pluck('total', 'date');

        $serviceExpenses = Service::selectRaw('DATE(date) as date, SUM(amnt) as total')
            ->where('vehicle_number', $vehicleNumber)
            ->when($businessId, fn($q) => $q->where('business_id', $businessId))
            ->when($fromDate, fn($q) => $q->whereDate('date', '>=', $fromDate))
            ->when($toDate, fn($q) => $q->whereDate('date', '<=', $toDate))
            ->groupBy('date')
            ->pluck('total', 'date');

        // Owner payments from paidowners table
        // Vehicle field format: "VehicleName[VehicleNumber]" (e.g., "Toyota[ABC-1234]")
        $ownerPayments = PaidOwner::selectRaw('DATE(date) as date, SUM(paid_amnt) as total')
            ->where('vehicle', 'LIKE', '%[' . $vehicleNumber . ']%')
            ->when($businessId, fn($q) => $q->where('business_id', $businessId))
            ->when($fromDate, fn($q) => $q->whereDate('date', '>=', $fromDate))
            ->when($toDate, fn($q) => $q->whereDate('date', '<=', $toDate))
            ->groupBy('date')
            ->pluck('total', 'date');

        $expensesMap = [];
        foreach ($fuelExpenses as $date => $total) {
            $expensesMap[$date] = ($expensesMap[$date] ?? 0) + $total;
        }
        foreach ($serviceExpenses as $date => $total) {
            $expensesMap[$date] = ($expensesMap[$date] ?? 0) + $total;
        }
        foreach ($ownerPayments as $date => $total) {
            $expensesMap[$date] = ($expensesMap[$date] ?? 0) + $total;
        }

        // -------------------------
        // 3) Merge income & expenses (keep your current response shape)
        // -------------------------
        $allDates = collect(array_unique(array_merge(array_keys($incomeMap), array_keys($expensesMap))))
            ->sort()
            ->values();

        if ($fromDate) $allDates = $allDates->filter(fn($d) => $d >= $fromDate);
        if ($toDate)   $allDates = $allDates->filter(fn($d) => $d <= $toDate);

        $labels        = [];
        $incomeValues  = [];
        $expenseValues = [];

        foreach ($allDates as $date) {
            $labels[]        = $date;
            $incomeValues[]  = round($incomeMap[$date]   ?? 0, 2);
            $expenseValues[] = round($expensesMap[$date] ?? 0, 2);
        }

        return response()->json([
            'labels'         => $labels,
            'income'         => $incomeValues,
            'expenses'       => $expenseValues,
            'total_income'   => array_sum($incomeValues),
            'total_expenses' => array_sum($expenseValues),
        ]);
    }







    #Acc Functions

    public function accindex(Request $request)
    {
        // Get the query parameters
        $vehicleNumber = $request->input('vehicle_number');
        $fromDate      = $request->input('from_date');
        $toDate        = $request->input('to_date');
        $agn           = $request->input('agn');
        $bookingId     = $request->input('booking_id');

        // Start building the query with business_id scoping
        $query = PostBooking::where('business_id', Auth::user()->business_id);

        // Apply text filters
        if (!empty($vehicleNumber)) {
            $query->where('vehicle_number', 'like', "%{$vehicleNumber}%");
        }

        if (!empty($agn)) {
            $query->where('agn', 'like', "%{$agn}%");
        }

        if (!empty($bookingId)) {
            $query->where('booking_id', 'like', "%{$bookingId}%");
        }

        /**
         * DATE FILTER LOGIC
         *
         * 🔹 If both from_date and to_date are given:
         *     -> show ONLY bookings fully inside that range
         *        from_date >= fromDate
         *        to_date   <= toDate
         *
         * 🔹 If only from_date is given:
         *     -> match that exact from_date
         *
         * 🔹 If only to_date is given:
         *     -> match that exact to_date
         */
        if (!empty($fromDate) && !empty($toDate)) {

            // Bookings fully inside the selected period
            $query->whereDate('from_date', '>=', $fromDate)
                ->whereDate('to_date',   '<=', $toDate);
        } elseif (!empty($fromDate)) {

            // Only from_date given -> match bookings starting on that date
            $query->whereDate('from_date', $fromDate);
        } elseif (!empty($toDate)) {

            // Only to_date given -> match bookings ending on that date
            $query->whereDate('to_date', $toDate);
        }

        // Get the filtered results, ordered by latest first
        // (you can change latest() to latest('from_date') if you want by from_date)
        $postBookings   = $query->latest()->get();
        $sumTotalIncome = $postBookings->sum('total_income');

        // Return the view with the filtered results
        return view('Acc.CompletedBus', compact('postBookings', 'sumTotalIncome'));
    }



    public function accshow(PostBooking $postBooking)
    {
        $business = \App\Models\Business::find(Auth::user()->business_id);

        return view('Acc.DetailedPostBookings', compact('postBooking', 'business'));
    }






    #Owner Functions

    public function ownerindex(Request $request)
    {
        // Get the query parameters
        $vehicleNumber = $request->input('vehicle_number');
        $fromDate      = $request->input('from_date');
        $toDate        = $request->input('to_date');
        $agn           = $request->input('agn');
        $bookingId     = $request->input('booking_id');

        // Start building the query with business_id scoping
        $query = PostBooking::where('business_id', Auth::user()->business_id);

        // Apply text filters
        if (!empty($vehicleNumber)) {
            $query->where('vehicle_number', 'like', "%{$vehicleNumber}%");
        }

        if (!empty($agn)) {
            $query->where('agn', 'like', "%{$agn}%");
        }

        if (!empty($bookingId)) {
            $query->where('booking_id', 'like', "%{$bookingId}%");
        }

        /**
         * DATE FILTER LOGIC
         *
         * 🔹 If both from_date and to_date are given:
         *     -> show ONLY bookings fully inside that range
         *        from_date >= fromDate
         *        to_date   <= toDate
         *
         * 🔹 If only from_date is given:
         *     -> match that exact from_date
         *
         * 🔹 If only to_date is given:
         *     -> match that exact to_date
         */
        if (!empty($fromDate) && !empty($toDate)) {

            // Bookings fully inside the selected period
            $query->whereDate('from_date', '>=', $fromDate)
                ->whereDate('to_date',   '<=', $toDate);
        } elseif (!empty($fromDate)) {

            // Only from_date given -> match bookings starting on that date
            $query->whereDate('from_date', $fromDate);
        } elseif (!empty($toDate)) {

            // Only to_date given -> match bookings ending on that date
            $query->whereDate('to_date', $toDate);
        }

        // Get the filtered results, ordered by latest first
        // (you can change latest() to latest('from_date') if you want by from_date)
        $postBookings   = $query->latest()->get();
        $sumTotalIncome = $postBookings->sum('total_income');

        // Return the view with the filtered results
        return view('Manager.OwnerCompletedBus', compact('postBookings', 'sumTotalIncome'));
    }

    public function ownershow(PostBooking $postBooking)
    {
        $business = \App\Models\Business::find(Auth::user()->business_id);

        return view('Manager.OwnerDetailedPostBookings', compact('postBooking', 'business'));
    }
}
