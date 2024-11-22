<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $vehicles = Vehicle::where('vehicle_number', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $vehicles = Vehicle::paginate(10);
        }

        return view('Manager.ManagerVehicles', compact('vehicles', 'search'));
    }

    public function show($id)
    {
        $vehicle = vehicle::find($id);

        if (!$vehicle) {
            // Redirect or handle the error if the vehicle is not found
            return redirect()->route('vehicles.index')->with('error', 'vehicle not found.');
        }

        // Pass the customer data to the view
        return view('Manager.Detailedvehicle', compact('vehicle'));    }

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
            'price_per_day' => 'required|string|max:255',
            'free_km' => 'required|string|max:255',
            'extra_km_chg' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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
            'price_per_day' => $request->price_per_day,
            'free_km' => $request->free_km,
            'extra_km_chg'=> $request->extra_km_chg,
            'features' => $features,
            'images' => $images,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!'); //why this line not working
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
            'price_per_day' => $request->price_per_day,
            'free_km' => $request->free_km,
            'extra_km_chg'=> $request->extra_km_chg,
            'features' => $features,
            'images' => $images,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
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

        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }

    public function getDetails($vehicle_number)
    {
        $vehicle = Vehicle::where('vehicle_number', $vehicle_number)->first();

        if ($vehicle) {
            return response()->json([
                'fuel_type' => $vehicle->fuel_type,
                'vehicle_name' => $vehicle->vehicle_name,
                'price_per_day' => $vehicle->price_per_day
            ]);
        }

        return response()->json(['message' => 'Vehicle not found'], 404);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $vehicles = Vehicle::where('vehicle_name', 'LIKE', "%{$query}%")->pluck('vehicle_number');
        return response()->json($vehicles);
    }

    public function getVehicleModels(Request $request)
{
    $search = $request->input('query');
    $models = Vehicle::where('vehicle_name', 'LIKE', "%$search%")->pluck('vehicle_name');

    return response()->json($models);
}

}
