<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Service;
use App\Models\Salary;
use App\Models\Payroll;
use App\Models\Expense;
use App\Models\PaidOwner;
use App\Models\PostBooking;
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

        // Get profit filter date range from request
        $profitStartDate = request()->input('profit_start_date');
        $profitEndDate = request()->input('profit_end_date');
        
        // Default to current month if no dates provided
        if (!$profitStartDate || !$profitEndDate) {
            $profitStartDate = Carbon::now()->startOfMonth()->toDateString();
            $profitEndDate = Carbon::now()->endOfMonth()->toDateString();
        }
        
        // Fetch profit data (daily for current month by default, or monthly for longer ranges)
        $profitData = $this->getProfitDataForGraph($businessId, null, $profitStartDate, $profitEndDate);

        return view('Manager.Dashboard', compact('bookingCounts', 'currentMonth', 'currentYear', 'expiringVehicles', 'serviceAlertVehicles', 'profitData', 'profitStartDate', 'profitEndDate'));
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

            // Always take the latest recorded service for this vehicle (created_at/date desc)
            $latestService = Service::where('business_id', $businessId)
                ->where('vehicle_number', $vehicle->vehicle_number)
                ->orderBy('date', 'desc')
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$latestService || is_null($latestService->next_mileage)) {
                continue;
            }

            $next = (int) preg_replace('/\D/', '', (string) $latestService->next_mileage);
            $diff = $next - $current; // positive => km left; negative/zero => overdue

            // Include if overdue OR within the threshold
            if ($diff <= $thresholdKm) {
                $serviceAlertVehicles->push([
                    'vehicle'       => $vehicle,
                    'service'       => $latestService,
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

    /**
     * Get profit data for a date range - daily for short ranges (<= 3 months), monthly for longer ranges
     */
    private function getProfitDataForGraph($businessId, $months = 6, $startDateFilter = null, $endDateFilter = null)
    {
        $profitData = [];
        
        if ($startDateFilter && $endDateFilter) {
            $start = Carbon::parse($startDateFilter);
            $end = Carbon::parse($endDateFilter);
            $daysDiff = $start->diffInDays($end);
            
            // If range is 90 days or less, show daily data, otherwise show monthly
            if ($daysDiff <= 90) {
                // Daily data
                $current = $start->copy();
                while ($current->lte($end)) {
                    $dateStr = $current->toDateString();
                    $profitData[] = $this->calculateProfitForDay($businessId, $dateStr, $current);
                    $current->addDay();
                }
            } else {
                // Monthly data for longer ranges
                $current = $start->copy()->startOfMonth();
                $endMonth = $end->copy()->endOfMonth();
                
                while ($current->lte($endMonth)) {
                    $monthStart = $current->copy()->startOfMonth();
                    $monthEnd = $current->copy()->endOfMonth();
                    
                    // Adjust boundaries if within custom range
                    if ($monthStart->lt($start)) {
                        $monthStart = $start->copy();
                    }
                    if ($monthEnd->gt($end)) {
                        $monthEnd = $end->copy();
                    }
                    
                    $startDate = $monthStart->toDateString();
                    $endDate = $monthEnd->toDateString();
                    
                    $profitData[] = $this->calculateProfitForPeriod($businessId, $startDate, $endDate, $monthStart);
                    
                    $current->addMonth();
                }
            }
        } else {
            // Default: current month day by day
            $start = Carbon::now()->startOfMonth();
            $end = Carbon::now()->endOfMonth();
            $current = $start->copy();
            
            while ($current->lte($end)) {
                $dateStr = $current->toDateString();
                $profitData[] = $this->calculateProfitForDay($businessId, $dateStr, $current);
                $current->addDay();
            }
        }
        
        return $profitData;
    }
    
    /**
     * Calculate profit data for a single day
     */
    private function calculateProfitForDay($businessId, $dateStr, $date)
    {
        // Calculate income for the day
        $total_income = PostBooking::where('business_id', $businessId)
            ->whereDate('to_date', $dateStr)
            ->sum('total_income');

        // Calculate expenses for the day
        $salary = Salary::where('business_id', $businessId)
            ->whereDate('date', $dateStr)->sum('amnt');

        $advanced_salary = Payroll::where('business_id', $businessId)
            ->whereDate('paid_date', $dateStr)->sum('gross');

        $vehicle_services = Service::where('business_id', $businessId)
            ->where('type', 'Oil Change')->whereDate('date', $dateStr)->sum('amnt');

        $vehicle_repair = Service::where('business_id', $businessId)
            ->where('type', 'Repair')->whereDate('date', $dateStr)->sum('amnt');

        $vehicle_maintenance = Service::where('business_id', $businessId)
            ->where('type', 'Maintenance')->whereDate('date', $dateStr)->sum('amnt');

        $vehicle_owner_payment = PaidOwner::where('business_id', $businessId)
            ->whereDate('date', $dateStr)->sum('paid_amnt');

        // Sum ALL expenses regardless of category
        $all_expenses = Expense::where('business_id', $businessId)
            ->whereDate('date', $dateStr)->sum('amnt');

        $total_expenses = $salary + $vehicle_services + $vehicle_maintenance
            + $advanced_salary + $vehicle_repair + $vehicle_owner_payment
            + $all_expenses;

        $net_profit = $total_income - $total_expenses;

        return [
            'month' => $date->format('M d'),
            'month_short' => $date->format('M d'),
            'income' => $total_income,
            'expenses' => $total_expenses,
            'profit' => $net_profit,
        ];
    }
    
    /**
     * Calculate profit data for a specific period
     */
    private function calculateProfitForPeriod($businessId, $startDate, $endDate, $monthStart)
    {

        // Calculate income
        $total_income = PostBooking::where('business_id', $businessId)
            ->whereBetween('to_date', [$startDate, $endDate])
            ->sum('total_income');

        // Calculate expenses (same logic as ProfitLossController)
        $salary = Salary::where('business_id', $businessId)
            ->whereBetween('date', [$startDate, $endDate])->sum('amnt');

        $advanced_salary = Payroll::where('business_id', $businessId)
            ->whereBetween('paid_date', [$startDate, $endDate])->sum('gross');

        $vehicle_services = Service::where('business_id', $businessId)
            ->where('type', 'Oil Change')->whereBetween('date', [$startDate, $endDate])->sum('amnt');

        $vehicle_repair = Service::where('business_id', $businessId)
            ->where('type', 'Repair')->whereBetween('date', [$startDate, $endDate])->sum('amnt');

        $vehicle_maintenance = Service::where('business_id', $businessId)
            ->where('type', 'Maintenance')->whereBetween('date', [$startDate, $endDate])->sum('amnt');

        $vehicle_owner_payment = PaidOwner::where('business_id', $businessId)
            ->whereBetween('date', [$startDate, $endDate])->sum('paid_amnt');

        // Sum ALL expenses regardless of category
        $all_expenses = Expense::where('business_id', $businessId)
            ->whereBetween('date', [$startDate, $endDate])->sum('amnt');

        $total_expenses = $salary + $vehicle_services + $vehicle_maintenance
            + $advanced_salary + $vehicle_repair + $vehicle_owner_payment
            + $all_expenses;

        $net_profit = $total_income - $total_expenses;

        // Format label based on whether it's a full month or partial
        $daysInPeriod = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        if ($daysInPeriod >= 25 && $monthStart->format('Y-m') == Carbon::parse($endDate)->format('Y-m')) {
            // Full month
            $label = $monthStart->format('M Y');
        } else {
            // Partial month or custom range
            $label = $monthStart->format('M d') . ' - ' . Carbon::parse($endDate)->format('M d, Y');
        }

        return [
            'month' => $label,
            'month_short' => $monthStart->format('M'),
            'income' => $total_income,
            'expenses' => $total_expenses,
            'profit' => $net_profit,
        ];
    }
    
    /**
     * API endpoint to get filtered profit data
     */
    public function getProfitData(Request $request)
    {
        $businessId = Auth::user()->business_id;
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $profitData = $this->getProfitDataForGraph($businessId, null, $startDate, $endDate);
        
        return response()->json($profitData);
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
