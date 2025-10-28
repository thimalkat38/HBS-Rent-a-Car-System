<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Service;
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

        // Fetch vehicles that need service within 500km
        $serviceAlertVehicles = $this->getServiceAlertVehicles($businessId);

        return view('Manager.ManagerDashboard', compact('bookingCounts', 'currentMonth', 'currentYear', 'expiringVehicles', 'serviceAlertVehicles'));
    }





    private function getServiceAlertVehicles($businessId, int $thresholdKm = 500)
    {
        // Pull vehicles with a current mileage
        $vehicles = Vehicle::where('business_id', $businessId)
            ->whereNotNull('current_mileage')
            ->get();
    
        $serviceAlertVehicles = collect();
    
        foreach ($vehicles as $vehicle) {
            // current_mileage may be nullable/string; sanitize to int
            $current = (int) preg_replace('/\D/', '', (string) $vehicle->current_mileage);
    
            // Build a base query for this vehicle's services
            $base = Service::where('business_id', $businessId)
                ->where('vehicle_number', $vehicle->vehicle_number);
    
            // Prefer the nearest *upcoming* next_mileage >= current
            $upcoming = (clone $base)
                ->where('next_mileage', '>=', $current)
                ->orderBy('next_mileage', 'asc')
                ->first();
    
            // If none upcoming, fall back to the *latest past* next_mileage
            $candidate = $upcoming ?: (clone $base)->orderBy('next_mileage', 'desc')->first();
    
            if (!$candidate || is_null($candidate->next_mileage)) {
                continue;
            }
    
            $next = (int) preg_replace('/\D/', '', (string) $candidate->next_mileage);
            $diff = $next - $current; // positive => km left; negative/zero => overdue
    
            // Include if overdue OR within the threshold
            if ($diff <= $thresholdKm) {
                $serviceAlertVehicles->push([
                    'vehicle'       => $vehicle,
                    'service'       => $candidate,
                    'mileage_left'  => $diff,                     // can be <= 0 when overdue
                    'abs_overdue'   => $diff < 0 ? abs($diff) : 0,
                    'status'        => $diff <= 0 ? 'overdue' : 'due_soon',
                ]);
            }
        }
    
        // Sort: overdue first (most overdue first), then due soon (closest first)
        return $serviceAlertVehicles
            ->sortBy([
                [fn ($r) => $r['status'] === 'overdue' ? 0 : 1, 'asc'],
                ['mileage_left', 'asc'], // negative values (more overdue) come first
            ])
            ->values();
    }
    

    public function getBookingsByDate(Request $request)
    {
        $date = $request->input('date');
        $businessId = Auth::user()->business_id; // Get the logged-in user's business_id

        // Get bookings for the 'from_date' (IN), filtering by business_id
        $inBookings = Booking::whereDate('from_date', $date)
            ->where('business_id', $businessId)
            ->pluck('vehicle_number');

        // Get bookings for the 'to_date' (OUT), filtering by business_id
        $outBookings = Booking::whereDate('to_date', $date)
            ->where('business_id', $businessId)
            ->pluck('vehicle_number');

        // Get all booked vehicle_numbers for the selected date (INCLUDES dates between from_date and to_date)
        $bookedVehicles = Booking::where('business_id', $businessId)
            ->whereDate('from_date', '<=', $date)
            ->whereDate('to_date', '>=', $date)
            ->pluck('vehicle_number')
            ->unique();

        // Get all vehicle numbers from vehicles table for the logged-in user's business_id
        $allVehicles = Vehicle::where('business_id', $businessId)
            ->pluck('vehicle_number');

        // Vehicles currently marked as in-service/repair
        $inServiceVehicles = Vehicle::where('business_id', $businessId)
            ->where('status', 1) // 1 => In Service/Repair
            ->pluck('vehicle_number');

        // Get available vehicles (exclude booked and in-service vehicles)
        $availableVehicles = $allVehicles
            ->diff($bookedVehicles)
            ->diff($inServiceVehicles);

        // Fetch vehicle details for available vehicles, filtering by business_id
        $availableVehiclesData = Vehicle::whereIn('vehicle_number', $availableVehicles)
            ->where('business_id', $businessId)
            ->get();

        // Fetch vehicle details for in-service vehicles
        $inServiceVehiclesData = Vehicle::whereIn('vehicle_number', $inServiceVehicles)
            ->where('business_id', $businessId)
            ->get();

        return response()->json([
            'in_bookings' => Booking::whereDate('from_date', $date)
                ->where('business_id', $businessId)
                ->get(),
            'out_bookings' => Booking::whereDate('to_date', $date)
                ->where('business_id', $businessId)
                ->get(),
            'available_vehicles' => $availableVehiclesData,
            'in_service_vehicles' => $inServiceVehiclesData,
        ]);
    }
}
