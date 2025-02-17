<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Display a listing of payrolls
    public function index(Request $request)
    {
        $query = Payroll::query();
    
        // Filter by Employee ID
        if ($request->filled('emp_id')) {
            $query->where('emp_id', $request->input('emp_id'));
        }
    
        // Filter by Month
        if ($request->filled('month')) {
            $query->whereMonth('paid_date', $request->input('month'));
        }
    
        // Sort by the most recent payrolls
        $payrolls = $query->orderBy('created_at', 'desc')->get();
    
        return view('Manager.Payroll', compact('payrolls'));
    }
    
    

    // Show the form for creating a new payroll
    public function create()
    {
        return view('Manager.AddPayroll');
    }

    // Store a newly created payroll in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'acc_num' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
            'paid_date' => 'required|date',
            'paid_amnt' => 'required|numeric',
        ]);
    
        // Retrieve the employee based on emp_id
        $employee = \App\Models\Employee::where('emp_id', $validated['emp_id'])->first();
    
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
    
        // Update advanced_salary (Add paid_amnt)
        $employee->advanced_salary = ($employee->advanced_salary ?? 0) + $validated['paid_amnt'];
    
        // Update remaining_salary (Reduce paid_amnt)
        $employee->remaining_salary = ($employee->remaining_salary ?? 0) - $validated['paid_amnt'];
    
        // Save the updated employee data
        $employee->save();
    
        // Store payroll data
        Payroll::create($validated);
    
        return redirect()->route('payrolls.index')->with('success', 'Payroll added successfully!');
    }
    

    // Display the specified payroll
    public function show($id)
    {
        $payroll = Payroll::findOrFail($id);
        return view('payrolls.show', compact('payroll'));
    }

    // Show the form for editing the specified payroll
    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        return view('payrolls.edit', compact('payroll'));
    }

    // Update the specified payroll in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'acc_num' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
            'paid_date' => 'required|date',
            'paid_amnt' => 'required|numeric',
        ]);

        $payroll = Payroll::findOrFail($id);
        $payroll->update($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully!');
    }

    // Remove the specified payroll from the database
    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();

        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully!');
    }

    
}
