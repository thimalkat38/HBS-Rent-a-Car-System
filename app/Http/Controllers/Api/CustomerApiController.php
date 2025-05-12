<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustomerApiController extends Controller
{
    // GET /api/customers
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Customer::where('business_id', $businessId);

        if ($request->filled('nic')) {
            $query->where('nic', 'LIKE', '%' . $request->nic . '%');
        }

        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->full_name . '%');
        }

        return response()->json($query->get());
    }

    // POST /api/customers
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:10',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'whatsapp' => 'nullable|max:20',
            'email' => 'nullable|email|max:255',
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

        $customer = Customer::create($validated);

        return response()->json(['message' => 'Customer created', 'data' => $customer], 201);
    }

    // GET /api/customers/{id}
    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    // PUT /api/customers/{id}
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:10',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'whatsapp' => 'nullable|max:20',
            'email' => 'nullable|email|max:255',
            'nic' => 'required|string|max:12|unique:customers,nic,' . $id,
            'address' => 'required|string|max:255',
        ]);

        $customer->update($validated);

        return response()->json(['message' => 'Customer updated successfully.']);
    }

    // DELETE /api/customers/{id}
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully.']);
    }

    // GET /api/customers/search?q=...
    public function search(Request $request)
    {
        $search = $request->input('q');
        $customers = Customer::where('full_name', 'LIKE', "%{$search}%")
            ->select('id', 'full_name')
            ->get();

        return response()->json($customers);
    }

    // GET /api/customers/{id}/details
    public function getCustomerDetails($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json([
            'phone' => $customer->phone,
            'nic' => $customer->nic,
            'address' => $customer->address,
        ]);
    }
}
