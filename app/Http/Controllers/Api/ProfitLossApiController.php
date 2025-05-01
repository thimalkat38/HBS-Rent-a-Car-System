<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\{Salary, Payroll, Service, Ownerpayment, Expense, Inventory, PostBooking};

class ProfitLossApiController extends Controller
{
    public function plReport(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $filterType = $request->input('filterType', null);

        if ($request->has('startDate') && $request->has('endDate') && $request->input('startDate') && $request->input('endDate')) {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $filterType = null;
        } else {
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
                    $startDate = '1900-01-01';
                    $endDate = Carbon::now()->toDateString();
                    break;
                default:
                    $startDate = Carbon::now()->startOfMonth()->toDateString();
                    $endDate = Carbon::now()->endOfMonth()->toDateString();
                    break;
            }
        }

        $data = [
            'salary' => Salary::where('business_id', $businessId)->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'advanced_salary' => Payroll::where('business_id', $businessId)->whereBetween('paid_date', [$startDate, $endDate])->sum('paid_amnt'),
            'vehicle_services' => Service::where('business_id', $businessId)->where('type', 'Oil Change')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'vehicle_repair' => Service::where('business_id', $businessId)->where('type', 'Repair')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'vehicle_maintenance' => Service::where('business_id', $businessId)->where('type', 'Maintenance')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'vehicle_owner_payment' => Ownerpayment::where('business_id', $businessId)->whereBetween('date', [$startDate, $endDate])->sum('paid_amnt'),
            'fuel_chargers' => Expense::where('business_id', $businessId)->where('cat', 'Fuel')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'utility_bills' => Expense::where('business_id', $businessId)->where('cat', 'Utility Bills')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'stock_in' => Inventory::where('business_id', $businessId)->whereBetween('date', [$startDate, $endDate])->sum('total_price'),
            'travel_fees' => Expense::where('business_id', $businessId)->where('cat', 'Travel')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'office_supplies' => Expense::where('business_id', $businessId)->where('cat', 'Office Supplies')->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'other_income' => Expense::where('business_id', $businessId)->whereIn('cat', ['Foods', 'Other'])->whereBetween('date', [$startDate, $endDate])->sum('amnt'),
            'total_income_by_rent' => PostBooking::where('business_id', $businessId)->whereBetween('to_date', [$startDate, $endDate])->sum('total_income'),
        ];

        $total_expenses = $data['salary'] + $data['vehicle_services'] + $data['vehicle_maintenance'] + $data['fuel_chargers']
            + $data['stock_in'] + $data['office_supplies'] + $data['advanced_salary']
            + $data['vehicle_repair'] + $data['vehicle_owner_payment'] + $data['utility_bills']
            + $data['travel_fees'] + $data['other_income'];

        $total_income = $data['total_income_by_rent'];

        $data['gross_profit'] = $total_income - $total_expenses;
        $data['net_profit'] = $data['gross_profit'];

        return response()->json([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'filter_type' => $filterType,
            'report' => $data
        ]);
    }
}
