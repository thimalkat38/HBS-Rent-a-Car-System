<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        // Calculate sum of remaining_salary from employees
        $totalRemainingSalary = Employee::sum('remaining_salary');

        // Calculate sum of advanced_salary from employees
        $totalAdvancedSalary = Employee::sum('advanced_salary');

        // Store the data in the salaries table
        Salary::create([
            'date' => $currentDate,
            'month' => $request->month,
            'amnt' => $totalRemainingSalary,
            'advanced_amnt' => $totalAdvancedSalary,
        ]);

        // Reset employee salary fields
        DB::transaction(function () {
            // Set advanced_salary to NULL and reset remaining_salary to salary column value
            Employee::query()->update([
                'advanced_salary' => null,
                'remaining_salary' => DB::raw('salary')
            ]);
        });

        return redirect()->back()->with('success', 'Salary Payment Recorded and Employee Salary Reset Successfully!');
    }
}
