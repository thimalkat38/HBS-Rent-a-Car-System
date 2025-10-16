<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index(Request $request)
    {

        $businessId = Auth::user()->business_id;
        $query = Customer::where('business_id', $businessId);

        // Unified search across NIC, Full Name, and Phone
        $search = $request->input('search');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nic', 'LIKE', "%{$search}%")
                    ->orWhere('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            });
        }

        // Backward-compatible individual filters if provided
        if ($request->filled('nic')) {
            $query->where('nic', 'LIKE', '%' . $request->input('nic') . '%');
        }

        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'LIKE', '%' . $request->input('phone') . '%');
        }

        // Paginate to enable links() and consistent numbering in the view
        $customers = $query->orderByDesc('id')->paginate(15)->appends($request->query());

        return view('Manager.Customers', compact('customers'));
    }



    // Show the form for creating a new customer
    public function create()
    {
        return view('Manager.NewAddCustomer');
    }

    // Store a newly created customer in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:10',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'whatsapp' => 'nullable|max:20',
            'email' => 'nullable|email|max:255', // Make email optional
            'nic' => 'nullable|string|max:12|unique:customers,nic',
            'address' => 'nullable|string|max:255',
            'nic_photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'dl_photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $businessId = Auth::user()->business_id;

        $nicPhotos = [];
        $dlPhotos = [];

        if ($request->hasFile('nic_photos')) {
            foreach ($request->file('nic_photos') as $file) {
                $nicPhotos[] = $file->store('uploads/nic_photos', 'public');
            }
        }

        if ($request->hasFile('dl_photos')) {
            foreach ($request->file('dl_photos') as $file) {
                $dlPhotos[] = $file->store('uploads/dl_photos', 'public');
            }
        }

        $validated['nic_photos'] = $nicPhotos;
        $validated['dl_photos'] = $dlPhotos;
        $validated['business_id'] = $businessId;
        $validated['status'] = 'active'; // Set default status as active

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    // Show the form for editing the specified customer
    public function edit(Customer $customer)
    {
        return view('Manager.NewEditCustomer', compact('customer'));
    }

    // Update the specified customer in storage
    public function update(Request $request, Customer $customer)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|min:10|max:15',
                'whatsapp' => 'nullable|max:20',
                'email' => 'nullable|email|max:255', // Make email optional
                'nic' => 'required|string|max:12|unique:customers,nic,' . $customer->id,
                'address' => 'required|string|max:255',
                'deactivate' => 'nullable',
                'deactivate_reason' => 'nullable|string|max:255',
            ]);

            // Handle status based on deactivate checkbox
            // Checkbox sends 'on' when checked, nothing when unchecked
            if ($request->filled('deactivate')) {
                $validated['status'] = 'deactivate';
                $validated['reason'] = $validated['deactivate_reason'] ?? null;
            } else {
                $validated['status'] = 'active';
                $validated['reason'] = null;
            }

            // Remove the checkbox fields from validated data as they're not in the database
            unset($validated['deactivate'], $validated['deactivate_reason']);

            $customer->update($validated);

            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while updating the customer: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Remove the specified customer from storage
    public function destroy(Customer $customer)
    {
        // Delete the specified customer
        $customer->delete();

        // Reorder the IDs
        $this->reorderCustomerIds();

        return redirect()->route('customers.index')->with('success', 'Customer deleted and IDs reordered successfully.');
    }

    /**
     * Reorder the IDs of the customers to maintain sequential order.
     */
    private function reorderCustomerIds()
    {
        $customers = Customer::orderBy('id')->get();
        $counter = 1;

        foreach ($customers as $customer) {
            if ($customer->id != $counter) {
                $customer->id = $counter;
                $customer->save();
            }
            $counter++;
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $customers = Customer::where('full_name', 'LIKE', "%{$query}%")->get();

        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        return view('Manager.NewDetailedCustomer', compact('customer'));
    }

    public function getCustomerDetails($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            return response()->json([
                'phone' => $customer->phone,
                'nic' => $customer->nic,
                'address' => $customer->address,
            ]);
        } else {
            return response()->json([
                'message' => 'Customer not found',
            ], 404);
        }
    }
    public function searche(Request $request)
    {
        $search = $request->input('q');
        $customers = Customer::where('full_name', 'LIKE', "%{$search}%")
            ->select('id', 'full_name')
            ->get();

        return response()->json($customers);
    }
}
