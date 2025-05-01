<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class VehicleApiController extends Controller
{
    public function index()
    {
        $businessId = Auth::user()->business_id;
        $vehicles = Vehicle::where('business_id', $businessId)->get();

        return response()->json($vehicles);
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }

        return response()->json($vehicle);
    }

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

        $vehicle = Vehicle::create([
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

        return response()->json([
            'message' => 'Vehicle added successfully',
            'vehicle' => $vehicle
        ], 201);
    }
}
