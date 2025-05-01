<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function calendarView()
    {
        $businessId = Auth::user()->business_id; // Get the logged-in user's business_id
        $currentMonth = request()->input('month', now()->month);
        $currentYear = request()->input('year', now()->year);

        $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        // Fetch booking counts for the logged-in user's business_id
        $bookingCounts = Booking::where('business_id', $businessId) // Filter by business_id
            ->whereBetween('from_date', [$startDate, $endDate])
            ->selectRaw('DATE(from_date) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        // Fetch expiring vehicles for the logged-in user's business_id
        $currentDate = Carbon::now();
        $tenDaysLater = $currentDate->copy()->addDays(10);

        $expiringVehicles = Vehicle::where('business_id', $businessId) // Filter by business_id
            ->where(function ($query) use ($tenDaysLater) {
                $query->whereDate('license_exp_date', '<=', $tenDaysLater)
                    ->orWhereDate('insurance_exp_date', '<=', $tenDaysLater);
            })
            ->get();

        return view('Manager.ManagerDashboard', compact('bookingCounts', 'currentMonth', 'currentYear', 'expiringVehicles'));
    }





    public function getBookingsByDate(Request $request)
    {
        $date = $request->input('date');
        $businessId = Auth::user()->business_id; // Get the logged-in user's business_id

        // Get bookings for the 'from_date' (IN), filtering by business_id
        $inBookings = Booking::whereDate('from_date', $date)
            ->where('business_id', $businessId)  // Filter by business_id
            ->pluck('vehicle_number');

        // Get bookings for the 'to_date' (OUT), filtering by business_id
        $outBookings = Booking::whereDate('to_date', $date)
            ->where('business_id', $businessId)  // Filter by business_id
            ->pluck('vehicle_number');

        // Get all booked vehicles for the selected date
        $bookedVehicles = $inBookings->merge($outBookings)->unique();

        // Get all vehicle numbers from vehicles table for the logged-in user's business_id
        $allVehicles = Vehicle::where('business_id', $businessId)
            ->pluck('vehicle_number');

        // Get available vehicles (not in bookedVehicles)
        $availableVehicles = $allVehicles->diff($bookedVehicles);

        // Fetch vehicle details for available vehicles, filtering by business_id
        $availableVehiclesData = Vehicle::whereIn('vehicle_number', $availableVehicles)
            ->where('business_id', $businessId)  // Filter by business_id
            ->get();

        return response()->json([
            'in_bookings' => Booking::whereDate('from_date', $date)
                ->where('business_id', $businessId)
                ->get(),
            'out_bookings' => Booking::whereDate('to_date', $date)
                ->where('business_id', $businessId)
                ->get(),
            'available_vehicles' => $availableVehiclesData
        ]);
    }
}
