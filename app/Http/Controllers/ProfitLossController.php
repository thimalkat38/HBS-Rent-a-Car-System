<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Payroll;
use App\Models\Service;
use App\Models\Expense;
use App\Models\Inventory;
use App\Models\Ownerpayment;
use App\Models\PostBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfitLossController extends Controller
{
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        // Get filter type from dropdown
        $filterType = $request->input('filterType', null);

        // Check if manual date range is provided
        if ($request->has('startDate') && $request->has('endDate') && $request->input('startDate') && $request->input('endDate')) {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $filterType = null; // Reset dropdown selection when using manual dates
        } else {
            // Apply default filter based on dropdown selection
            switch ($filterType) {
                case 'today':
                    $startDate = Carbon::today()->toDateString();
                    $endDate = Carbon::today()->toDateString();
                    break;
                case 'this_month':
                    $startDate = Carbon::now()->startOfMonth()->toDateString();
                    $endDate = Carbon::now()->endOfMonth()->toDateString();
                    break;
                case 'last_month':
                    $startDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
                    $endDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
                    break;
                case 'total':
                    $startDate = '1900-01-01'; // Fetch all records
                    $endDate = Carbon::now()->toDateString();
                    break;
                default:
                    $startDate = Carbon::now()->startOfMonth()->toDateString();
                    $endDate = Carbon::now()->endOfMonth()->toDateString();
                    break;
            }
        }

        // Fetch totals with date filtering and business_id scoping
        $data = [
            'salary' => Salary::where('business_id', $businessId)
                ->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'advanced_salary' => Payroll::where('business_id', $businessId)
                ->whereBetween('paid_date', [$startDate, $endDate])->sum('gross'),

            'vehicle_services' => Service::where('business_id', $businessId)
                ->where('type', 'Oil Change')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'vehicle_repair' => Service::where('business_id', $businessId)
                ->where('type', 'Repair')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'vehicle_maintenance' => Service::where('business_id', $businessId)
                ->where('type', 'Maintenance')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'vehicle_owner_payment' => Ownerpayment::where('business_id', $businessId)
                ->whereBetween('date', [$startDate, $endDate])->sum('paid_amnt'),

            'fuel_chargers' => Expense::where('business_id', $businessId)
                ->where('cat', 'Fuel')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'utility_bills' => Expense::where('business_id', $businessId)
                ->where('cat', 'Utility Bills')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'stock_in' => Inventory::where('business_id', $businessId)
                ->whereBetween('date', [$startDate, $endDate])->sum('total_price'),

            'travel_fees' => Expense::where('business_id', $businessId)
                ->where('cat', 'Travel')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'office_supplies' => Expense::where('business_id', $businessId)
                ->where('cat', 'Office Supplies')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'other_income' => Expense::where('business_id', $businessId)
                ->whereIn('cat', ['Foods', 'Other'])->whereBetween('date', [$startDate, $endDate])->sum('amnt'),

            'total_income_by_rent' => PostBooking::where('business_id', $businessId)
                ->whereBetween('to_date', [$startDate, $endDate])->sum('total_income'),
        ];

        // Calculate Gross & Net Profit
        $total_expenses = $data['salary'] + $data['vehicle_services'] + $data['vehicle_maintenance'] + $data['fuel_chargers']
            + $data['stock_in'] + $data['office_supplies'] + $data['advanced_salary']
            + $data['vehicle_repair'] + $data['vehicle_owner_payment'] + $data['utility_bills']
            + $data['travel_fees'] + $data['other_income'];

        $total_income = $data['total_income_by_rent'];

        $data['gross_profit'] = $total_income - $total_expenses;
        $data['net_profit'] = $data['gross_profit']; // Adjust if needed

        return view('Manager.PLReport', compact('data', 'startDate', 'endDate', 'filterType'));
    }
}
