<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleOwner;

class VehicleOwnerApiController extends Controller
{
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = VehicleOwner::where('business_id', $businessId);

        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }

        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', '%' . $request->input('vehicle_number') . '%');
        }

        $vehicleOwners = $query->get();

        return response()->json($vehicleOwners);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable|string',
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

        $validated['business_id'] = Auth::user()->business_id;

        $vehicleOwner = VehicleOwner::create($validated);

        return response()->json([
            'message' => 'Vehicle owner created successfully.',
            'vehicle_owner' => $vehicleOwner,
        ]);
    }

    public function update(Request $request, $id)
    {
        $vehicleOwner = VehicleOwner::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable|string',
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

        return response()->json([
            'message' => 'Vehicle owner updated successfully.',
            'vehicle_owner' => $vehicleOwner,
        ]);
    }

    public function destroy($id)
    {
        $vehicleOwner = VehicleOwner::findOrFail($id);
        $vehicleOwner->delete();

        return response()->json(['message' => 'Vehicle owner deleted successfully.']);
    }
}
