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
            'vehicle_number'   => 'required|string',
            'invoice_number'   => 'nullable|string',
            'type'             => 'required|string',
            'current_mileage'  => 'nullable|string',
            'next_mileage'     => 'nullable|string',
            'amnt'             => 'nullable|string',
            'station'          => 'nullable|string',
            'date'             => 'nullable|date',
            'next_date'        => 'nullable|date',
            'features'         => 'nullable|array',
    
            // 🔁 new validation for brake KM
            'front_brake_km'   => 'nullable|integer|min:0',
            'rear_brake_km'    => 'nullable|integer|min:0',
        ]);
    
        // Base data
        $data = $request->all();
        $data['business_id'] = Auth::user()->business_id;
    
        // Build features array
        $features = $request->input('features', []);
    
        // 🔁 Add brakes (in KM) to features
        if ($request->filled('front_brake_km')) {
            $features[] = 'Front Brake: ' . $request->front_brake_km . ' km';
        }
    
        if ($request->filled('rear_brake_km')) {
            $features[] = 'Rear Brake: ' . $request->rear_brake_km . ' km';
        }
    
        $data['features'] = $features;
    
        // Save
        $service = Service::create($data);
    
        if ($request->ajax()) {
            return response()->json(['service' => $service], 201);
        }
    
        return redirect()
            ->route('services.index', ['vehicle_number' => $request->vehicle_number])
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
    
        // --- Service Info ---
        $content .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $content .= "<tr><td colspan='2'><strong>Service Record Details</strong></td></tr>";
        $content .= "<tr><td><strong>Vehicle Number:</strong></td><td>" . e($service->vehicle_number) . "</td></tr>";
        $content .= "<tr><td><strong>Service Date:</strong></td><td>" . e($service->date) . "</td></tr>";
        $content .= "<tr><td><strong>Service Type:</strong></td><td>" . e($service->type) . "</td></tr>";
        $content .= "<tr><td><strong>Invoice Number:</strong></td><td>" . e($service->invoice_number) . "</td></tr>";
        $content .= "<tr><td><strong>Service Station:</strong></td><td>" . e($service->station) . "</td></tr>";
        $content .= "<tr><td><strong>Current Mileage:</strong></td><td>" . e($service->current_mileage) . "</td></tr>";
        $content .= "<tr><td><strong>Next Service Mileage:</strong></td><td>" . e($service->next_mileage) . "</td></tr>";
        $content .= "</table>";
    
        $content .= "<br><br>";
    
        // --- Features Table ---
        $content .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $content .= "<tr><td colspan='2'><strong>Service Features</strong></td></tr>";
    
        // Display labels + default actions
        $featureRows = [
            'engine oil'                 => ['Engine Oil', 'Changed'],
            'clutch oil'                 => ['Clutch Oil', 'Performed'],
            'differential oil'           => ['Differential Oil', 'Performed'],
            'gear oil'                   => ['Gear Oil', 'Performed'],
            'gear oil(auto)'             => ['Gear Oil (Auto)', 'Performed'],
            'radiator coolant'           => ['Radiator Coolant', 'Performed'],
            'inverter coolant'           => ['Inverter Coolant', 'Performed'],
            'battery water'              => ['Battery Water', 'Performed'],
            'oil filter'                 => ['Oil Filter', 'Replace'],
            'diesel filter'              => ['Diesel Filter', 'Performed'],
            'air filter'                 => ['Air Filter', 'Clean'],
            'a/c filter'                 => ['A/C Filter', 'Clean'],
            'FR LH/RH caliper lubricant' => ['FR LH/RH Caliper Lubricant', 'Performed'],
            'RR LH/RH caliper lubricant' => ['RR LH/RH Caliper Lubricant', 'Performed'],
            'HV Battery blower'          => ['HV Battery Blower', 'Performed'],
    
            // Brakes are special: value is inside features text as "... 12345 km"
            'front brake'                => ['Front Brake (KM)', null],
            'rear brake'                 => ['Rear Brake (KM)',  null],
        ];
    
        // --- Normalize $service->features to an array of strings ---
        $serviceFeatures = $service->features;
        if (is_string($serviceFeatures)) {
            $decoded = json_decode($serviceFeatures, true);
            $serviceFeatures = is_array($decoded) ? $decoded : [];
        }
        if (!is_array($serviceFeatures)) {
            $serviceFeatures = [];
        }
    
        // Helper: find a KM number for a given brake side in features lines
        $extractBrakeKm = function(array $lines, string $needle) {
            $km = null;
            $found = false;
    
            foreach ($lines as $line) {
                if (!is_string($line)) continue;
    
                $lower = mb_strtolower($line);
                if (mb_strpos($lower, $needle) !== false) {
                    $found = true;
    
                    // Try to extract a number followed by optional "km"
                    // Handles: "12000", "12,000", "12000 km", "12 000 KM"
                    if (preg_match('/(\d[\d,\s]*)\s*(km)?/i', $line, $m)) {
                        // Remove separators like commas/spaces
                        $numeric = preg_replace('/[^\d.]/', '', $m[1]);
                        if ($numeric !== '' && is_numeric($numeric)) {
                            $km = $numeric;
                        }
                    }
                    // We don't break immediately to prefer later lines if needed,
                    // but you can break here if first match is enough.
                }
            }
    
            return [$found, $km];
        };
    
        // Pre-extract brake kms (so we don’t loop repeatedly)
        list($frontFound, $frontKm) = $extractBrakeKm($serviceFeatures, 'front brake');
        list($rearFound,  $rearKm)  = $extractBrakeKm($serviceFeatures, 'rear brake');
    
        foreach ($featureRows as $key => [$label, $defaultAction]) {
            $status = 'Not Performed';
            $value  = '';
    
            if ($key === 'front brake') {
                if ($frontFound && $frontKm !== null) {
                    $status = 'Recorded';
                    $value  = ' (' . e($frontKm) . ' km)';
                } elseif ($frontFound) {
                    // Mentioned but no numeric KM found
                    $status = 'Recorded';
                } else {
                    $status = 'Not Recorded';
                }
    
            } elseif ($key === 'rear brake') {
                if ($rearFound && $rearKm !== null) {
                    $status = 'Recorded';
                    $value  = ' (' . e($rearKm) . ' km)';
                } elseif ($rearFound) {
                    $status = 'Recorded';
                } else {
                    $status = 'Not Recorded';
                }
    
            } else {
                // Regular features: mark as performed if present in features list
                $matched = false;
                foreach ($serviceFeatures as $sf) {
                    if (!is_string($sf)) continue;
                    if (mb_stripos($sf, $key) !== false) {
                        if ($key === 'engine oil') {
                            $status = 'Changed';
                        } elseif ($key === 'oil filter') {
                            $status = 'Replace';
                        } elseif ($key === 'air filter' || $key === 'a/c filter') {
                            $status = 'Clean';
                        } else {
                            $status = $defaultAction ?? 'Performed';
                        }
                        $matched = true;
                        break;
                    }
                }
                if (!$matched) {
                    $status = 'Not Performed';
                }
            }
    
            $content .= "<tr><td>" . e($label) . "</td><td>" . e($status) . $value . "</td></tr>";
        }
    
        $content .= "</table>";
        $content .= "</body></html>";
    
        return $content;
    }
    
}