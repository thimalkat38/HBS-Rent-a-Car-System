<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Vehicle;

class DashboardApiController extends Controller
{
public function apiCalendarSummary(Request $request)
{
    $businessId = Auth::user()->business_id;

    $bookingCounts = Booking::where('business_id', $businessId)
        ->selectRaw('DATE(from_date) as date, COUNT(*) as count')
        ->groupBy('date')
        ->pluck('count', 'date');

    $tenDaysLater = now()->addDays(10);

    $expiringVehicles = Vehicle::where('business_id', $businessId)
        ->where(function ($query) use ($tenDaysLater) {
            $query->whereDate('license_exp_date', '<=', $tenDaysLater)
                ->orWhereDate('insurance_exp_date', '<=', $tenDaysLater);
        })->get();

    return response()->json([
        'booking_counts' => $bookingCounts,
        'expiring_vehicles' => $expiringVehicles,
    ]);
}


    public function apiGetBookingsByDate(Request $request)
    {
        $date = $request->input('date');
        $businessId = Auth::user()->business_id;

        $inBookings = Booking::whereDate('from_date', $date)
            ->where('business_id', $businessId)
            ->get();

        $outBookings = Booking::whereDate('to_date', $date)
            ->where('business_id', $businessId)
            ->get();

        $bookedVehicles = $inBookings->pluck('vehicle_number')
            ->merge($outBookings->pluck('vehicle_number'))
            ->unique();

        $allVehicles = Vehicle::where('business_id', $businessId)->pluck('vehicle_number');

        $availableVehicleNumbers = $allVehicles->diff($bookedVehicles);

        $availableVehicles = Vehicle::whereIn('vehicle_number', $availableVehicleNumbers)
            ->where('business_id', $businessId)
            ->get();

        return response()->json([
            'in_bookings' => $inBookings,
            'out_bookings' => $outBookings,
            'available_vehicles' => $availableVehicles,
        ]);
    }
}
