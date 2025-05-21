<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:102400',
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
        $this->copyStorageToPublic();

        return response()->json([
            'message' => 'Vehicle added successfully',
            'vehicle' => $vehicle
        ], 201);
    }

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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

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
            $images = $vehicle->images;
        }

        $features = [
            'chassy_number' => $request->boolean('chassyNumber'),
            'leather_seats' => $request->boolean('leatherSeats'),
            'air_conditioner' => $request->boolean('airConditioner'),
            'power_steering' => $request->boolean('powerSteering'),
            'cd_player' => $request->boolean('cdPlayer'),
            'power_door' => $request->boolean('powerDoor'),
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
            'display_image' => $request->input('display_image') ?? $vehicle->display_image,
        ]);
        $this->copyStorageToPublic();

        return response()->json(['message' => 'Vehicle updated successfully!', 'vehicle' => $vehicle]);
    }

    public function delete($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        foreach ($vehicle->images as $image) {
            Storage::disk('public')->delete($image);
        }

        $vehicle->delete();

        // $this->reorderVehicleIds();

        return response()->json(['message' => 'Vehicle deleted and IDs reordered successfully!']);
    }

    private function copyStorageToPublic()
{
    $source = storage_path('app/public');
    $destination = public_path('storage');

    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $this->recursiveCopy($source, $destination);
}

private function recursiveCopy($source, $destination)
{
    $directory = opendir($source);

    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    while (($file = readdir($directory)) !== false) {
        if ($file !== '.' && $file !== '..') {
            $srcFile = $source . DIRECTORY_SEPARATOR . $file;
            $destFile = $destination . DIRECTORY_SEPARATOR . $file;

            if (is_dir($srcFile)) {
                $this->recursiveCopy($srcFile, $destFile);
            } else {
                copy($srcFile, $destFile);
            }
        }
    }

    closedir($directory);
}

}
