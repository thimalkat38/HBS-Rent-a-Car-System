<?php

namespace App\Http\Controllers;

use App\Models\PostBooking;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Get the query parameters
        $vehicleNumber = $request->input('vehicle_number');
        $fromDate = $request->input('from_date');
        $agn = $request->input('agn');
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

        if ($agn) {
            $query->where('agn', 'like', "%$agn%");
        }

        // Determine pagination based on order
        if ($order) {
            [$start, $end] = explode('-', $order);
            $query->skip((int) $start - 1)->take((int) $end - (int) $start + 1);
        }

        // Get the filtered results, ordered by latest first
        $postBookings = $query->latest()->get();

        // Return the view with the filtered results
        return view('Manager.CompletedBus', compact('postBookings'));
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
            'agn' => 'nullable|string',
            'start_km' => 'nullable|string',
            'end_km' => 'nullable|string',
            'drived' => 'nullable|string',
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
        ]);

        $postBooking->update($validated);

        return redirect()->route('postbookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(PostBooking $postBooking)
    {
        $postBooking->delete();

        return redirect()->route('postbookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function getProfitData(Request $request)
    {
        $request->validate([
            'vehicle_number' => 'required|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
        ]);
    
        $vehicleNumber = $request->vehicle_number;
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $businessId = Auth::check() ? Auth::user()->business_id : null;
    
        // -------------------------
        // 1. Income (distribute per day)
        // -------------------------
        $bookings = Postbooking::where('vehicle_number', $vehicleNumber)
            ->when($businessId, fn($q) => $q->where('business_id', $businessId))
            ->when($fromDate, fn($q) => $q->whereDate('to_date', '>=', $fromDate)) // overlap check
            ->when($toDate, fn($q) => $q->whereDate('from_date', '<=', $toDate))   // overlap check
            ->get();
    
        $incomeMap = [];

        foreach ($bookings as $booking) {
            $start = new \DateTime($booking->from_date);
            $end = new \DateTime($booking->to_date);
            $end->modify('+1 day'); // include to_date

            $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);
            $days = iterator_count($period);
    
            $dailyIncome = $days > 0 ? $booking->total_income / $days : $booking->total_income;
    
            foreach ($period as $date) {
                $d = $date->format('Y-m-d');
                $incomeMap[$d] = ($incomeMap[$d] ?? 0) + $dailyIncome;
            }
        }
    
        // -------------------------
        // 2. Expenses (Fuel + Services)
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
    
        $expensesMap = [];
        foreach ($fuelExpenses as $date => $total) {
            $expensesMap[$date] = ($expensesMap[$date] ?? 0) + $total;
        }
        foreach ($serviceExpenses as $date => $total) {
            $expensesMap[$date] = ($expensesMap[$date] ?? 0) + $total;
        }
    
        // -------------------------
        // 3. Merge income & expenses
        // -------------------------
        $allDates = collect(array_unique(array_merge(array_keys($incomeMap), array_keys($expensesMap))))
            ->sort()
            ->values();
    
        if ($fromDate) {
            $allDates = $allDates->filter(fn($d) => $d >= $fromDate);
        }
        if ($toDate) {
            $allDates = $allDates->filter(fn($d) => $d <= $toDate);
        }
    
        $labels = [];
        $incomeValues = [];
        $expenseValues = [];
    
        foreach ($allDates as $date) {
            $labels[] = $date;
            $incomeValues[] = round($incomeMap[$date] ?? 0, 2);
            $expenseValues[] = round($expensesMap[$date] ?? 0, 2);
        }
    
        // -------------------------
        // 4. Return JSON response
        // -------------------------
        return response()->json([
            'labels' => $labels,
            'income' => $incomeValues,
            'expenses' => $expenseValues,
            'total_income' => array_sum($incomeValues),
            'total_expenses' => array_sum($expenseValues),
        ]);
    }
    
    
    
    
}
