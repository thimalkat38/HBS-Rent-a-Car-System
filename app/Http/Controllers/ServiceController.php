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

        return view('Manager.NewServices', compact('services', 'vehicle_number', 'latestService'));
    }





    public function create()
    {
        return view('Manager.NewServices');
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
            'features' => 'nullable|array',
            'front_brake_percentage' => 'nullable|integer|min:0|max:100',
            'rear_brake_percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $data = $request->all();
        $data['business_id'] = Auth::user()->business_id; // Attach business_id

        // Handle brake percentages and add them to features
        $features = $request->input('features', []);
        
        if ($request->has('front_brake_percentage') && $request->front_brake_percentage !== null) {
            $features[] = 'Front Brake: ' . $request->front_brake_percentage . '%';
        }
        
        if ($request->has('rear_brake_percentage') && $request->rear_brake_percentage !== null) {
            $features[] = 'Rear Brake: ' . $request->rear_brake_percentage . '%';
        }
        
        $data['features'] = $features;

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
            'features' => 'nullable|array',
            'front_brake_percentage' => 'nullable|integer|min:0|max:100',
            'rear_brake_percentage' => 'nullable|integer|min:0|max:100',
        ]);

        $data = $request->all();
        
        // Handle brake percentages and add them to features
        $features = $request->input('features', []);
        
        if ($request->has('front_brake_percentage') && $request->front_brake_percentage !== null) {
            $features[] = 'Front Brake: ' . $request->front_brake_percentage . '%';
        }
        
        if ($request->has('rear_brake_percentage') && $request->rear_brake_percentage !== null) {
            $features[] = 'Rear Brake: ' . $request->rear_brake_percentage . '%';
        }
        
        $data['features'] = $features;

        $service->update($data);

        return response()->json(['message' => 'Service Updated Successfully', 'service' => $service]);
    }

    public function downloadExcel(Service $service)
    {
        // Create Excel content
        $filename = 'Service_Record_' . $service->vehicle_number . '_' . $service->date . '.xls';
        
        // Set headers for Excel download
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'max-age=0',
        ];

        // Create Excel content
        $content = $this->generateExcelContent($service);
        
        return response($content, 200, $headers);
    }

    private function generateExcelContent(Service $service)
    {
        $content = "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">";
        $content .= "<head><meta charset=\"utf-8\"><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Service Record</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>";
        $content .= "<body>";
        
        // Service Information
        $content .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $content .= "<tr><td colspan='2'><strong>Service Record Details</strong></td></tr>";
        $content .= "<tr><td><strong>Vehicle Number:</strong></td><td>" . $service->vehicle_number . "</td></tr>";
        $content .= "<tr><td><strong>Service Date:</strong></td><td>" . $service->date . "</td></tr>";
        $content .= "<tr><td><strong>Service Type:</strong></td><td>" . $service->type . "</td></tr>";
        $content .= "<tr><td><strong>Invoice Number:</strong></td><td>" . $service->invoice_number . "</td></tr>";
        $content .= "<tr><td><strong>Amount:</strong></td><td>RS " . $service->amnt . "</td></tr>";
        $content .= "<tr><td><strong>Service Station:</strong></td><td>" . $service->station . "</td></tr>";
        $content .= "<tr><td><strong>Current Mileage:</strong></td><td>" . $service->current_mileage . "</td></tr>";
        $content .= "<tr><td><strong>Next Service Mileage:</strong></td><td>" . $service->next_mileage . "</td></tr>";
        $content .= "</table>";
        
        $content .= "<br><br>";
        
        // Service Features
        $content .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $content .= "<tr><td colspan='2'><strong>Service Features</strong></td></tr>";
        
        // Define all possible features and their custom action labels
        $featureRows = [
            'engine oil'   => 'Changed',
            'clutch oil'   => 'Performed',
            'differential oil' => 'Performed',
            'gear oil' => 'Performed',
            'gear oil(auto)' => 'Performed',
            'radiator coolant' => 'Performed',
            'inverter coolant' => 'Performed',
            'battery water' => 'Performed',
            'oil filter' => 'Replace',
            'diesel filter' => 'Performed',
            'air filter' => 'Clean',
            'a/c filter' => 'Clean',
            'FR LH/RH caliper lubricant' => 'Performed',
            'RR LH/RH caliper lubricant' => 'Performed',
            'HV Battery blower' => 'Performed',
            'front brake' => 'Performed',
            'rear brake' => 'Performed'
        ];
        
        // Check which features were performed
        $serviceFeatures = $service->features ?: [];
        
        foreach ($featureRows as $feature => $label) {
            $status = 'Not Performed';
            $value = '';

            foreach ($serviceFeatures as $serviceFeature) {
                if (stripos($serviceFeature, $feature) !== false) {
                    // Custom action for engine oil, oil filter, air filter, ac filter
                    if ($feature === 'engine oil') {
                        $status = 'Changed';
                    } elseif ($feature === 'oil filter') {
                        $status = 'Replace';
                    } elseif ($feature === 'air filter' || $feature === 'a/c filter') {
                        $status = 'Clean';
                    } else {
                        $status = $label;
                    }
                    // Extract percentage if it's a brake feature
                    if (strpos($serviceFeature, '%') !== false) {
                        $value = ' (' . $serviceFeature . ')';
                    }
                    break;
                }
            }
            
            $content .= "<tr><td>" . ucwords($feature) . "</td><td>" . $status . $value . "</td></tr>";
        }
        
        $content .= "</table>";
        $content .= "</body></html>";
        
        return $content;
    }
}