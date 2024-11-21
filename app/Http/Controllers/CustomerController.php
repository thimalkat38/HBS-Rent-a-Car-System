<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index(Request $request)
    {
        $search = $request->input('search');

        // If a search query exists, filter customers by V/NUMBER
        if ($search) {
            $customers = customer::where('nic', 'LIKE', "%{$search}%")->get();
        } else {
            // If no search query, return all customers
            $customers = customer::all();
        }

        return view('Manager.ManagerCustomers', compact('customers'));
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('Manager.ManagerAddCustomer');
    }

    // Store a newly created customer in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:10',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255',
            'nic' => 'required|string|max:12|unique:customers,nic',
            'address' => 'required|string|max:255',
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    // Show the form for editing the specified customer
    public function edit(Customer $customer)
    {
        return view('Manager.ManagerEditCustomer', compact('customer'));
    }

    // Update the specified customer in storage
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:10',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255',
            'nic' => 'required|string|max:12|unique:customers,nic,' . $customer->id,
            'address' => 'required|string|max:255',
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified customer from storage
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for customers whose full name contains the query string
        $customers = Customer::where('full_name', 'LIKE', "%{$query}%")->get();

        // Return only the necessary fields (full_name)
        return response()->json($customers);
    }



    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            // Redirect or handle the error if the customer is not found
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        // Pass the customer data to the view
        return view('customers.show', compact('customer'));
    }

    public function getCustomerDetails($id)
{
    $customer = Customer::find($id);

    if ($customer) {
        return response()->json([
            'phone' => $customer->phone,
            'nic' => $customer->nic
        ]);
    } else {
        return response()->json([
            'message' => 'Customer not found'
        ], 404);
    }
}

}
