<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class PayrollController extends Controller
{
    // Display a listing of payrolls
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Payroll::where('business_id', $businessId);

        // 🔍 Filter by emp_id OR emp_name
        if ($request->filled('emp_id')) {
            $query->where('emp_id', $request->input('emp_id'));
        }

        // 📅 Filter by Month (from payrolls.month column)
        if ($request->filled('month')) {
            $query->where('month', $request->input('month'));
        }

        // 📆 Filter by Paid Date Range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('paid_date', [$request->from_date, $request->to_date]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('paid_date', '>=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('paid_date', '<=', $request->to_date);
        }

        // Payrolls
        $payrolls = $query->orderBy('created_at', 'desc')->get();

        // ✅ Fetch employees for dropdown
        $employees = Employee::where('business_id', $businessId)
            ->orderBy('emp_name')
            ->get();

        return view('Manager.NewPayroll', compact('payrolls', 'employees'));
    }





    // Show the form for creating a new payroll
    public function create()
    {
        $businessId = Auth::user()->business_id;

        // Fetch only employees related to the logged-in user's business
        $employees = \App\Models\Employee::where('business_id', $businessId)->get();

        return view('Manager.NewAddPayrolls', compact('employees'));
    }


    // Store a newly created payroll in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id'     => 'required|string|max:255',
            'emp_name'     => 'required|string|max:255',
            'month'      => 'required|string|min:1|max:12',
            'leaves'     => 'nullable|integer|min:0',
            'basic'      => 'required|numeric',
            'paid_date'  => 'required|date',

            // Earnings
            'earnings'   => 'nullable|array',
            'earnings.*.name'   => 'nullable|string|max:255',
            'earnings.*.amount' => 'nullable|numeric|min:0',

            // Deductions
            'deductions' => 'nullable|array',
            'deductions.*.name'   => 'nullable|string|max:255',
            'deductions.*.amount' => 'nullable|numeric|min:0',

            'gross'      => 'required|numeric',
        ]);

        $businessId = Auth::user()->business_id;

        // ✅ Filter out empty earnings
        if (!empty($validated['earnings'])) {
            $validated['earnings'] = array_values(array_filter(
                $validated['earnings'],
                fn($item) => !empty($item['name']) || !empty($item['amount'])
            ));
        }

        // ✅ Filter out empty deductions
        if (!empty($validated['deductions'])) {
            $validated['deductions'] = array_values(array_filter(
                $validated['deductions'],
                fn($item) => !empty($item['name']) || !empty($item['amount'])
            ));
        }

        // Find employee
        $employee = \App\Models\Employee::where('emp_id', $validated['emp_id'])
            ->where('business_id', $businessId)
            ->first();

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }

        // Add business_id
        $validated['business_id'] = $businessId;

        // Store payroll
        \App\Models\Payroll::create($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll added successfully!');
    }





    // Display the specified payroll
    public function show($id)
    {
        $payroll = Payroll::findOrFail($id);
        return view('Manager.DetailedPayroll', compact('payroll'));
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

    public function getLeavesCount(Request $request)
    {
        $empId = $request->input('emp_id');
        $month = $request->input('month'); // 1-12

        if (!$empId || !$month) {
            return response()->json(['leaves' => 0]);
        }

        $year = date('Y'); // Or allow user to choose year if needed
        $startOfMonth = date("Y-m-01", strtotime("$year-$month-01"));
        $endOfMonth = date("Y-m-t", strtotime("$year-$month-01"));

        // Fetch leaves that overlap with the month
        $leaves = Leave::where('emp_id', $empId)
            ->where('status', 'accepted')
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('from_date', [$startOfMonth, $endOfMonth])
                    ->orWhereBetween('to_date', [$startOfMonth, $endOfMonth])
                    ->orWhere(function ($q) use ($startOfMonth, $endOfMonth) {
                        $q->where('from_date', '<=', $startOfMonth)
                            ->where('to_date', '>=', $endOfMonth);
                    });
            })
            ->sum('leave_days');

        return response()->json(['leaves' => $leaves]);
    }

    public function getEmployeeSalary(Request $request)
    {
        $empId = $request->input('emp_id');

        if (!$empId) {
            return response()->json(['salary' => null]);
        }

        $employee = Employee::where('emp_id', $empId)->first();

        return response()->json([
            'salary' => $employee ? $employee->salary : null,
        ]);
    }
}
