<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     */
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = \App\Models\Vehicle::where('business_id', $businessId);

        // Filter: Search by vehicle_number or vehicle_name
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('vehicle_number', 'like', "%$search%")
                    ->orWhere('vehicle_name', 'like', "%$search%");
            });
        }

        // Filter: Availability
        if ($request->filled('availability')) {
            $today = now()->toDateString();

            $query->where(function ($q) use ($request, $today) {
                if ($request->availability === 'available') {
                    $q->whereDoesntHave('bookings', function ($subQuery) use ($today) {
                        $subQuery->whereDate('from_date', '<=', $today)
                            ->whereDate('to_date', '>=', $today);
                    });
                }

                if ($request->availability === 'in_tour') {
                    $q->whereHas('bookings', function ($subQuery) use ($today) {
                        $subQuery->whereDate('from_date', '<=', $today)
                            ->whereDate('to_date', '>=', $today);
                    });
                }
            });
        }

        $vehicles = $query->paginate(9);

        return view('Manager.AllVehicles', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = vehicle::find($id);

        if (!$vehicle) {
            // Redirect or handle the error if the vehicle is not found
            return redirect()->route('vehicles.index')->with('error', 'vehicle not found.');
        }

        // Pass the customer data to the view
        return view('Manager.NewDetailedVehicle', compact('vehicle'));
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

                // ✅ Copy uploaded file to public/storage
                $this->copyUploadedFileToPublic($path);
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

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!');
    }
    private function copyUploadedFileToPublic($relativePath)
    {
        $source = storage_path('app/public/' . $relativePath);
        $destination = public_path('storage/' . $relativePath);

        if (!file_exists(dirname($destination))) {
            mkdir(dirname($destination), 0777, true);
        }

        copy($source, $destination);
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
        $images = $vehicle->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('vehicle_images', 'public');
                $images[] = $path;
    
                // ✅ Copy uploaded file to public/storage just like in store()
                $this->copyUploadedFileToPublic($path);
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


        return redirect('allvehicles')->with('success', 'Vehicle updated successfully!');
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

        return redirect('allvehicles')->with('success', 'Vehicle deleted and IDs reordered successfully!');
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
    public function vehicleAvailability(Request $request)
    {
        $businessId = $request->input('business_id');
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        // Get all vehicles for the business
        $vehicles = Vehicle::where('business_id', $businessId)->get();

        // Get all bookings that overlap with the selected dates
        $bookedVehicleNumbers = Booking::where('business_id', $businessId)
            ->where(function ($q) use ($from, $to) {
                $q->where(function ($q2) use ($from, $to) {
                    $q2->where('from_date', '<=', $to)
                        ->where('to_date', '>=', $from);
                });
            })
            ->pluck('vehicle_number')
            ->toArray();

        $available = [];
        $unavailable = [];

        foreach ($vehicles as $vehicle) {
            $item = [
                'number' => $vehicle->vehicle_number,
                'model' => $vehicle->vehicle_name,
            ];
            if (in_array($vehicle->vehicle_number, $bookedVehicleNumbers)) {
                $unavailable[] = $item;
            } else {
                $available[] = $item;
            }
        }

        return response()->json([
            'available' => $available,
            'unavailable' => $unavailable,
        ]);
    }
public function deleteImage(Request $request, $id)
{
    $vehicle = Vehicle::findOrFail($id);

    $imageToDelete = $request->input('image');

    // Remove the image from the images array
    $images = $vehicle->images ?? [];
    if (($key = array_search($imageToDelete, $images)) !== false) {
        unset($images[$key]);
        $images = array_values($images); // reindex
    }

    // If the deleted image was the display image, set display_image to null or another image
    if ($vehicle->display_image === $imageToDelete) {
        $vehicle->display_image = count($images) > 0 ? $images[0] : null;
    }

    $vehicle->images = $images;
    $vehicle->save();

    // Delete the image file from storage
    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($imageToDelete)) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($imageToDelete);
    }

    return redirect()->back()->with('success', 'Image deleted successfully.');
}
}
