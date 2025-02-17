<?php

namespace App\Http\Controllers;

use App\Models\VehicleOwner;
use Illuminate\Http\Request;

class VehicleOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VehicleOwner::query();
    
        // Filter by Full Name if provided
        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }
    
        // Filter by Vehicle Number if provided
        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', '%' . $request->input('vehicle_number') . '%');
        }
    
        // Get the filtered vehicle owners
        $vehicleOwners = $query->get();
    
        return view('Manager.VehicleOwners', compact('vehicleOwners'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Manager.AddVehicleOwner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'rental_amnt' => 'required|numeric',
            'monthly_km' => 'required|numeric',
            'extra_km_chg' => 'required|numeric',
            'acc_no' => 'nullable|string|max:255',
            'bank_detais' => 'nullable|string',
        ]);
    
        // Create new vehicle owner (owner_id is auto-generated)
        VehicleOwner::create($validated);
    
        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner created successfully.');
    }    

    /**
     * Display the specified resource.
     */
    public function show(VehicleOwner $vehicleOwner)
    {
        return view('Manager.DetailedVehicleOwner', compact('vehicleOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleOwner $vehicleOwner)
    {
        return view('Manager.EditVehicleOwner', compact('vehicleOwner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleOwner $vehicleOwner)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'rental_amnt' => 'required|numeric',
            'monthly_km' => 'required|numeric',
            'extra_km_chg' => 'required|numeric',
            'acc_no' => 'nullable|string|max:255',
            'bank_detais' => 'nullable|string',
        ]);

        $vehicleOwner->update($validated);

        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleOwner $vehicleOwner)
    {
        $vehicleOwner->delete();

        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner deleted successfully.');
    }
}
