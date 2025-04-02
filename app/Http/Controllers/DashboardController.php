<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Vehicle;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function calendarView()
    {
        $currentMonth = request()->input('month', now()->month);
        $currentYear = request()->input('year', now()->year);

        $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        $bookingCounts = Booking::whereBetween('from_date', [$startDate, $endDate])
            ->selectRaw('DATE(from_date) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        // Fetch expiring vehicles
        $currentDate = Carbon::now();
        $tenDaysLater = $currentDate->copy()->addDays(10);

        $expiringVehicles = Vehicle::whereDate('license_exp_date', '<=', $tenDaysLater)
            ->orWhereDate('insurance_exp_date', '<=', $tenDaysLater)
            ->get();

        return view('Manager.ManagerDashboard', compact('bookingCounts', 'currentMonth', 'currentYear', 'expiringVehicles'));
    }



    public function getBookingsByDate(Request $request)
    {
        $date = $request->input('date');

        // Get bookings for the 'from_date' (IN)
        $inBookings = Booking::whereDate('from_date', $date)->pluck('vehicle_number');

        // Get bookings for the 'to_date' (OUT)
        $outBookings = Booking::whereDate('to_date', $date)->pluck('vehicle_number');

        // Get all booked vehicles for the selected date
        $bookedVehicles = $inBookings->merge($outBookings)->unique();

        // Get all vehicle numbers from vehicles table
        $allVehicles = Vehicle::pluck('vehicle_number');

        // Get available vehicles (not in bookedVehicles)
        $availableVehicles = $allVehicles->diff($bookedVehicles);

        // Fetch vehicle details for available vehicles
        $availableVehiclesData = Vehicle::whereIn('vehicle_number', $availableVehicles)->get();

        return response()->json([
            'in_bookings' => Booking::whereDate('from_date', $date)->get(),
            'out_bookings' => Booking::whereDate('to_date', $date)->get(),
            'available_vehicles' => $availableVehiclesData
        ]);
    }

    // public function dashboard()
    // {
    //     $currentDate = Carbon::now();
    //     $tenDaysLater = $currentDate->addDays(10);

    //     $expiringVehicles = Vehicle::whereDate('license_exp_date', '<=', $tenDaysLater)
    //         ->orWhereDate('insurance_exp_date', '<=', $tenDaysLater)
    //         ->get();

    //     return view('Manager.ManagerDashboard', compact('expiringVehicles'));
    // }
}
