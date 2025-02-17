<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Employee;
use App\Models\Customer;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     */
    public function index()
    {
        $expenses = Expense::orderBy('date', 'desc')->get();
        return view('Manager.ListExpenses', compact('expenses'));
    }

    /**
     * Show the form for creating a new expense.
     */



    public function create()
    {
        $employees = Employee::select('emp_id', 'emp_name')->get(); // Fetching only required columns
        $customers = Customer::select('id', 'full_name')->get(); // Fetch customers
        return view('Manager.AddExpenses', compact('employees'));
    }


    /**
     * Store a newly created expense in storage.
     */




    public function store(Request $request)
    {
        $request->validate([
            'cat' => 'required|string',
            'date' => 'required|date',
            'for_emp' => 'nullable|exists:employees,emp_id', // Ensure valid employee ID
            'for_cus' => 'nullable|exists:customers,id', // Ensure valid customer ID
            'fuel_for' =>'nullable|string',
            'docs' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
            'amnt' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        // Fetch full names from related tables
        $customerName = $request->for_cus ? DB::table('customers')->where('id', $request->for_cus)->value('full_name') : null;
        $employeeName = $request->for_emp ? DB::table('employees')->where('emp_id', $request->for_emp)->value('emp_name') : null;

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('docs')) {
            $filePath = $request->file('docs')->store('expenses', 'public'); // Saves to storage/app/public/expenses
        }

        // Save to database
        $expense = new Expense();
        $expense->cat = $request->cat;
        $expense->date = $request->date;
        $expense->for_emp = $employeeName; // Store Employee Name
        $expense->for_cus = $customerName; // Store Customer Name
        $expense->fuel_for = $request->fuel_for;
        $expense->docs = $filePath;  // Store only path
        $expense->amnt = $request->amnt;
        $expense->note = $request->note;
        $expense->save();

        return redirect()->back()->with('success', 'Expense saved successfully!');
    }






    /**
     * Display the specified expense.
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified expense.
     */
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified expense in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat' => 'nullable|string',
            'date' => 'required|date',
            'for_emp' => 'nullable|string',
            'for_cus' => 'nullable|string',
            'docs' => 'nullable|string',
            'amnt' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified expense from storage.
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }

    public function download($id)
    {
        $expense = Expense::findOrFail($id);

        if ($expense->docs) {
            // Since we store the full path (expenses/filename.jpg), we use it directly
            $filePath = storage_path('app/public/' . $expense->docs);

            if (file_exists($filePath)) {
                return response()->download($filePath);
            }
        }

        return redirect()->back()->with('error', 'File not found!');
    }
}
