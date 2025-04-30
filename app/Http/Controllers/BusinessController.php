<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    /**
     * Display a listing of the vehicles.
     */
    // public function index(Request $request)
    // {
    //     $search = $request->input('search');

    //     if ($search) {
    //         $Businesss = Business::where('Business_number', 'LIKE', "%{$search}%")->get();
    //     } else {
    //         $Businesss = Business::all();
    //     }

    //     return view('SuperAdmin.Dashboard', compact('Businesses', 'search',));
    // }


    public function show($id)
    {
        $Business = Business::find($id);

        if (!$Business) {
            // Redirect or handle the error if the Business is not found
            return redirect()->route('Business.index')->with('error', 'Business not found.');
        }

        // Pass the customer data to the view
        return view('SuperAdmin.DetailedBusiness', compact('Business'));
    }
  
    public function create()
    {
        return view('SuperAdmin.AddBusiness');
    }

    public function store(Request $request)
    {
        $request->validate([
            'b_name' => 'required|string|max:255',
            'o_name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'b_phone' => 'required|string|max:255',
            'o_phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'reg_date' => 'required|date',
        ]);
   
    
        Business::create([
            // 'b_id' => $generatedBId,
            'b_name' => $request->b_name,
            'o_name' => $request->o_name,
            'email' => $request->email,
            'b_phone' => $request->b_phone,
            'o_phone' => $request->o_phone,
            'address' => $request->address,
            'status' => 'active', // Default status
            'reg_date' => $request->reg_date,
        ]);
    
        return redirect('superadmin')->with('success', 'Business Added successfully!');
    }
    

    public function edit($id)
    {
        $Business = Business::findOrFail($id);
        return view('SuperAdmin.EditBusiness', compact('Business'));
    }

    public function update(Request $request, $id)
    {
        $business = Business::findOrFail($id);
    
        $request->validate([
            'b_name' => 'required|string|max:255',
            'o_name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'b_phone' => 'required|string|max:255',
            'o_phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        $business->update([
            'b_name' => $request->b_name,
            'o_name' => $request->o_name,
            'email' => $request->email,
            'b_phone' => $request->b_phone,
            'o_phone' => $request->o_phone,
            'address' => $request->address,
        ]);
    
        return redirect('superadmin')->with('success', 'Business updated successfully!');
    }

    public function destroy($id)
    {
        $Business = Business::findOrFail($id);

        // Delete the Business record
        $Business->delete();

        // Reorder the IDs
        // $this->reorderBusinessIds();

        return redirect('superadmin')->with('success', 'Business deleted and IDs reordered successfully!');
    }

    // /**
    //  * Reorder the IDs of the vehicles to maintain sequential order.
    //  */
    // private function reorderVehicleIds()
    // {
    //     $vehicles = Vehicle::orderBy('id')->get();
    //     $counter = 1;

    //     foreach ($vehicles as $vehicle) {
    //         if ($vehicle->id != $counter) {
    //             $vehicle->id = $counter;
    //             $vehicle->save();
    //         }
    //         $counter++;
    //     }
    // }


    // public function getDetails($vehicle_number)
    // {
    //     $vehicle = Vehicle::where('vehicle_number', $vehicle_number)->first();

    //     if ($vehicle) {
    //         return response()->json([
    //             'fuel_type' => $vehicle->fuel_type,
    //             'vehicle_name' => $vehicle->vehicle_name,
    //             'vehicle_model' => $vehicle->vehicle_model,
    //             'price_per_day' => $vehicle->price_per_day,
    //             'extra_km_chg' => $vehicle->extra_km_chg,
    //             'free_km' => $vehicle->free_km
    //         ]);
    //     }

    //     return response()->json(['message' => 'Vehicle not found'], 404);
    // }


    // public function search(Request $request)
    // {
    //     $query = Business::query();

    //     if ($request->filled('b_name')) {
    //         $query->where('b_name', 'LIKE', "%{$request->b_name}%");
    //     }

    //     if ($request->filled('o_name')) {
    //         $query->where('o_name', 'LIKE', "%{$request->o_name}%");
    //     }

    //     if ($request->filled('reg_date')) {
    //         $query->where('reg_date', $request->reg_date);
    //     }


    //     // Retrieve matching vehicles
    //     $Businesses = $query->get();

    //     return view('SuperAdmin.Dashboard', compact('businesses'));
    // }






    // public function getVehicleModels(Request $request)
    // {
    //     $search = $request->input('query');
    //     $models = Vehicle::where('vehicle_name', 'LIKE', "%$search%")->pluck('vehicle_name');

    //     return response()->json($models);
    // }

    // public function autocomplete(Request $request)
    // {
    //     $query = $request->get('term', '');

    //     $vehicleModels = Vehicle::where('vehicle_model', 'LIKE', $query . '%')
    //         ->distinct()
    //         ->pluck('vehicle_model');

    //     return response()->json($vehicleModels);
    // }
    // public function autocompleteVehicleNumber(Request $request)
    // {
    //     $query = $request->get('term', '');

    //     $vehicleNumbers = Vehicle::where('vehicle_number', 'LIKE', $query . '%')
    //         ->distinct()
    //         ->pluck('vehicle_number');

    //     return response()->json($vehicleNumbers);
    // }
    // public function searchVehicles(Request $request)
    // {
    //     $query = $request->input('query'); // Get the search input

    //     if (!$query) {
    //         return response()->json(['error' => 'Query parameter is missing'], 400);
    //     }

    //     // Fetch matching vehicle numbers
    //     $vehicles = Vehicle::where('vehicle_number', 'LIKE', "%{$query}%")
    //         ->limit(10)
    //         ->pluck('vehicle_number');

    //     return response()->json($vehicles);
    // }


    // public function getVehicleNumbers(Request $request)
    // {
    //     $search = $request->input('query');
    //     $vehicleNumbers = Vehicle::where('vehicle_number', 'LIKE', "%{$search}%")
    //         ->pluck('vehicle_number');

    //     return response()->json($vehicleNumbers);
    // }
    // public function renewDocs($id)
    // {
    //     $vehicle = Vehicle::findOrFail($id);

    //     // Add one year to the dates
    //     $vehicle->license_exp_date = \Carbon\Carbon::parse($vehicle->license_exp_date)->addYear();
    //     $vehicle->insurance_exp_date = \Carbon\Carbon::parse($vehicle->insurance_exp_date)->addYear();

    //     $vehicle->save();

    //     return redirect()->back()->with('success', 'Documents renewed successfully.');
    // }
}
