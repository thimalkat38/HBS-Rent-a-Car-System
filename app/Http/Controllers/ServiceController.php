<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_number = $request->query('vehicle_number'); // Get vehicle number from URL
        $services = Service::where('vehicle_number', $vehicle_number)->get(); // Filter services
    
        return view('Manager.Services', compact('services', 'vehicle_number'));
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
            'amnt' => 'nullable|string',
            'station' => 'nullable|string',
            'date' => 'nullable|date',
        ]);
    
        $service = Service::create($request->all());
    
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
            'vehicle_number' => 'nullable|string',
            'invoice_number' => 'nullable|string',
            'type' => 'nullable|string',
            'amnt' => 'nullable|string',
            'station' => 'nullable|string',
            'date' => 'nullable|date',
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
