<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     */
    public function index()
    {
        $businessId = Auth::user()->business_id;

        $vehicles = \App\Models\Vehicle::where('business_id', $businessId)->get();

        return view('Manager.ManagerVehicles', compact('vehicles'));
    }



    public function show($id)
    {
        $vehicle = vehicle::find($id);

        if (!$vehicle) {
            // Redirect or handle the error if the vehicle is not found
            return redirect()->route('vehicles.index')->with('error', 'vehicle not found.');
        }

        // Pass the customer data to the view
        return view('Manager.DetailedVehicle', compact('vehicle'));
    }

    /**
     * Show the form for creating a new vehicle.
     */
    public function create()
    {
        return view('Manager.ManagerAddVehicle');
    }

    /**
     * Store a newly created vehicle in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_number' => 'required|string|max:255|unique:vehicles,vehicle_number',
            'vehicle_model' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'model_year' => 'required|integer|min:1886|max:' . date('Y'),
            'license_exp_date' => 'required|date',
            'insurance_exp_date' => 'required|date',
            'price_per_day' => 'required|string|max:255',
            'free_km' => 'required|string|max:255',
            'extra_km_chg' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $businessId = Auth::user()->business_id;

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('vehicle_images', 'public');
                $images[] = $path;
            }
        }

        $features = [
            'chassy_number' => $request->has('chassyNumber'),
            'leather_seats' => $request->has('leatherSeats'),
            'air_conditioner' => $request->has('airConditioner'),
            'power_steering' => $request->has('powerSteering'),
            'cd_player' => $request->has('cdPlayer'),
            'power_door' => $request->has('powerDoor'),
        ];

        Vehicle::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_number' => $request->vehicle_number,
            'vehicle_model' => $request->vehicle_model,
            'engine_number' => $request->engine_number,
            'fuel_type' => $request->fuel_type,
            'chassis_number' => $request->chassis_number,
            'model_year' => $request->model_year,
            'license_exp_date' => $request->license_exp_date,
            'insurance_exp_date' => $request->insurance_exp_date,
            'price_per_day' => $request->price_per_day,
            'free_km' => $request->free_km,
            'extra_km_chg' => $request->extra_km_chg,
            'features' => $features,
            'images' => $images,
            'display_image' => $images[0] ?? null,
            'business_id' => $businessId,
        ]);

        return redirect('manager/vehicles')->with('success', 'Vehicle Added successfully!'); // this line is not working
    }

    /**
     * Show the form for editing a vehicle.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('Manager.ManagerEditVehicle', compact('vehicle'));
    }

    /**
     * Update the specified vehicle in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_number' => 'required|string|max:255|unique:vehicles,vehicle_number,' . $vehicle->id,
            'vehicle_model' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'model_year' => 'required|integer|min:1886|max:' . date('Y'),
            'license_exp_date' => 'required|date',
            'insurance_exp_date' => 'required|date',
            'price_per_day' => 'required|string|max:255',
            'free_km' => 'required|string|max:255',
            'extra_km_chg' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Delete old images if new ones are uploaded
        if ($request->hasFile('images')) {
            foreach ($vehicle->images as $image) {
                Storage::disk('public')->delete($image);
            }

            $images = [];
            foreach ($request->file('images') as $file) {
                $path = $file->store('vehicle_images', 'public');
                $images[] = $path;
            }
        } else {
            // Keep the old images if no new ones are uploaded
            $images = $vehicle->images;
        }

        $features = [
            'chassy_number' => $request->has('chassyNumber'),
            'leather_seats' => $request->has('leatherSeats'),
            'air_conditioner' => $request->has('airConditioner'),
            'power_steering' => $request->has('powerSteering'),
            'cd_player' => $request->has('cdPlayer'),
            'power_door' => $request->has('powerDoor'),
        ];

        $vehicle->update([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_number' => $request->vehicle_number,
            'vehicle_model' => $request->vehicle_model,
            'engine_number' => $request->engine_number,
            'fuel_type' => $request->fuel_type,
            'chassis_number' => $request->chassis_number,
            'model_year' => $request->model_year,
            'license_exp_date' => $request->license_exp_date,
            'insurance_exp_date' => $request->insurance_exp_date,
            'price_per_day' => $request->price_per_day,
            'free_km' => $request->free_km,
            'extra_km_chg' => $request->extra_km_chg,
            'features' => $features,
            'images' => $images,
            'display_image' => $request->input('display_image') ?? $vehicle->display_image, // Ensure this line
        ]);


        return redirect('manager/vehicles')->with('success', 'Vehicle updated successfully!');
    }


    /**
     * Remove the specified vehicle from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Delete the vehicle images from storage
        foreach ($vehicle->images as $image) {
            Storage::disk('public')->delete($image);
        }

        // Delete the vehicle record
        $vehicle->delete();

        // Reorder the IDs
        $this->reorderVehicleIds();

        return redirect('manager/vehicles')->with('success', 'Vehicle deleted and IDs reordered successfully!');
    }

    /**
     * Reorder the IDs of the vehicles to maintain sequential order.
     */
    private function reorderVehicleIds()
    {
        $vehicles = Vehicle::orderBy('id')->get();
        $counter = 1;

        foreach ($vehicles as $vehicle) {
            if ($vehicle->id != $counter) {
                $vehicle->id = $counter;
                $vehicle->save();
            }
            $counter++;
        }
    }


    public function getDetails($vehicle_number)
    {
        $vehicle = Vehicle::where('vehicle_number', $vehicle_number)->first();

        if ($vehicle) {
            return response()->json([
                'fuel_type' => $vehicle->fuel_type,
                'vehicle_name' => $vehicle->vehicle_name,
                'vehicle_model' => $vehicle->vehicle_model,
                'price_per_day' => $vehicle->price_per_day,
                'extra_km_chg' => $vehicle->extra_km_chg,
                'free_km' => $vehicle->free_km
            ]);
        }

        return response()->json(['message' => 'Vehicle not found'], 404);
    }


    public function search(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Vehicle::where('business_id', $businessId);

        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', "%{$request->vehicle_number}%");
        }

        if ($request->filled('vehicle_name')) {
            $query->where('vehicle_name', 'LIKE', "%{$request->vehicle_name}%");
        }

        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }

        if ($request->filled('id_range')) {
            $idRange = $request->id_range;
            if ($idRange === '50+') {
                $query->where('id', '>', 50);
            } else {
                [$start, $end] = explode('-', $idRange);
                $query->whereBetween('id', [(int)$start, (int)$end]);
            }
        }

        $vehicles = $query->get();

        return view('Manager.ManagerVehicles', compact('vehicles'));
    }







    public function getVehicleModels(Request $request)
    {
        $search = $request->input('query');
        $models = Vehicle::where('vehicle_name', 'LIKE', "%$search%")->pluck('vehicle_name');

        return response()->json($models);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $vehicleModels = Vehicle::where('vehicle_model', 'LIKE', $query . '%')
            ->distinct()
            ->pluck('vehicle_model');

        return response()->json($vehicleModels);
    }
    public function autocompleteVehicleNumber(Request $request)
    {
        $query = $request->get('term', '');

        $vehicleNumbers = Vehicle::where('vehicle_number', 'LIKE', $query . '%')
            ->distinct()
            ->pluck('vehicle_number');

        return response()->json($vehicleNumbers);
    }
    public function searchVehicles(Request $request)
    {
        $query = $request->input('query'); // Get the search input

        if (!$query) {
            return response()->json(['error' => 'Query parameter is missing'], 400);
        }

        // Fetch matching vehicle numbers
        $vehicles = Vehicle::where('vehicle_number', 'LIKE', "%{$query}%")
            ->limit(10)
            ->pluck('vehicle_number');

        return response()->json($vehicles);
    }


    public function getVehicleNumbers(Request $request)
    {
        $search = $request->input('query');
        $vehicleNumbers = Vehicle::where('vehicle_number', 'LIKE', "%{$search}%")
            ->pluck('vehicle_number');

        return response()->json($vehicleNumbers);
    }
    public function renewDocs($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Add one year to the dates
        $vehicle->license_exp_date = \Carbon\Carbon::parse($vehicle->license_exp_date)->addYear();
        $vehicle->insurance_exp_date = \Carbon\Carbon::parse($vehicle->insurance_exp_date)->addYear();

        $vehicle->save();

        return redirect()->back()->with('success', 'Documents renewed successfully.');
    }
}
