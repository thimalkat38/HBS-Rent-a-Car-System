<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;
        $vehicle_number = $request->query('vehicle_number'); // Get vehicle number from URL
    
        // Fetch services belonging to the same business
        $services = Service::where('business_id', $businessId)
                            ->where('vehicle_number', $vehicle_number)
                            ->get();
    
        $latestService = Service::where('business_id', $businessId)
                                ->where('vehicle_number', $vehicle_number)
                                ->orderBy('created_at', 'desc')
                                ->first();
    
        return view('Manager.Services', compact('services', 'vehicle_number', 'latestService'));
    }
    
    
    
    

    public function create()
    {
        return view('Manager.Services');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_number' => 'required|string',
            'invoice_number' => 'nullable|string',
            'type' => 'required|string',
            'current_mileage' => 'nullable|string',
            'next_mileage' => 'nullable|string',
            'amnt' => 'nullable|string',
            'station' => 'nullable|string',
            'date' => 'nullable|date',
            'next_date' => 'nullable|date',
        ]);
    
        $data = $request->all();
        $data['business_id'] = Auth::user()->business_id; // Attach business_id
    
        $service = Service::create($data);
    
        if ($request->ajax()) {
            return response()->json(['service' => $service], 201);
        }
    
        return redirect()->route('services.index', ['vehicle_number' => $request->vehicle_number])
                         ->with('success', 'Service added successfully!');
    }
    
    
    

    public function show(Service $service)
    {
        return response()->json($service);
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'vehicle_number' => 'required|string',
            'invoice_number' => 'nullable|string',
            'type' => 'required|string',
            'current_mileage' => 'nullable|string',
            'next_mileage' => 'nullable|string',
            'amnt' => 'nullable|string',
            'station' => 'nullable|string',
            'date' => 'nullable|date',
            'next_date' => 'nullable|date',
        ]);

        $service->update($request->all());

        return response()->json(['message' => 'Service Updated Successfully', 'service' => $service]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service Deleted Successfully']);
    }
}
