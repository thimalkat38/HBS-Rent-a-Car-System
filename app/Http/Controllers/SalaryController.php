<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    /**
     * Store the salary payment record in the database and update employee salary fields.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'month' => 'required|string'
        ]);
    
        $businessId = Auth::user()->business_id; // Get current user's business ID
    
        // Get the current date
        $currentDate = Carbon::now()->toDateString();
    
        // Calculate sum of remaining_salary for employees of this business
        $totalRemainingSalary = Employee::where('business_id', $businessId)->sum('remaining_salary');
    
        // Calculate sum of advanced_salary for employees of this business
        $totalAdvancedSalary = Employee::where('business_id', $businessId)->sum('advanced_salary');
    
        // Store the data in the salaries table
        Salary::create([
            'date' => $currentDate,
            'month' => $request->month,
            'amnt' => $totalRemainingSalary,
            'advanced_amnt' => $totalAdvancedSalary,
            'business_id' => $businessId,
        ]);
    
        // Reset employee salary fields for this business only
        DB::transaction(function () use ($businessId) {
            Employee::where('business_id', $businessId)->update([
                'advanced_salary' => null,
                'remaining_salary' => DB::raw('salary')
            ]);
        });
    
        return redirect()->back()->with('success', 'Salary Payment Recorded and Employee Salary Reset Successfully!');
    }
    
}
