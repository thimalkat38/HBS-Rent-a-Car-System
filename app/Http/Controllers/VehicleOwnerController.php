<?php

namespace App\Http\Controllers;

use App\Models\VehicleOwner;
use App\Models\PaidOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VehicleOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        // Start the query scoped by business_id
        $query = VehicleOwner::where('business_id', $businessId);

        // Filter by Full Name if provided
        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }

        // Filter by Vehicle Number if provided
        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', '%' . $request->input('vehicle_number') . '%');
        }

        // Get the filtered vehicle owners
        $vehicleOwners = $query->get();

        return view('Manager.VehicleOwners', compact('vehicleOwners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Manager.AddVehicleOwner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
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

        // Attach business_id
        $validated['business_id'] = Auth::user()->business_id;

        // Create the vehicle owner
        VehicleOwner::create($validated);

        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, VehicleOwner $vehicleOwner)
    {
        $businessId = Auth::user()->business_id;

        // Determine date range (defaults to current month)
        $fromDate = $request->filled('from_date')
            ? Carbon::parse($request->input('from_date'))->startOfDay()
            : Carbon::now()->startOfMonth();

        $toDate = $request->filled('to_date')
            ? Carbon::parse($request->input('to_date'))->endOfDay()
            : Carbon::now()->endOfMonth();

        // Total paid amount for this owner within selected period
        $paidThisPeriod = PaidOwner::where('business_id', $businessId)
            ->where('owner_id', $vehicleOwner->owner_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->sum('paid_amnt');

        $monthlyRent = $vehicleOwner->rental_amnt;
        $dueThisPeriod = max($monthlyRent - $paidThisPeriod, 0);

        return view('Manager.DetailedVehicleOwner', [
            'vehicleOwner'   => $vehicleOwner,
            'paidThisPeriod' => $paidThisPeriod,
            'monthlyRent'    => $monthlyRent,
            'dueThisPeriod'  => $dueThisPeriod,
            'fromDate'       => $fromDate,
            'toDate'         => $toDate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleOwner $vehicleOwner)
    {
        return view('Manager.EditVehicleOwner', compact('vehicleOwner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleOwner $vehicleOwner)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
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

        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleOwner $vehicleOwner)
    {
        $vehicleOwner->delete();

        return redirect()->route('vehicle_owners.index')->with('success', 'Vehicle owner deleted successfully.');
    }


    public function Payments(Request $request, VehicleOwner $vehicleOwner)
    {
        $businessId = Auth::user()->business_id;

        $query = PaidOwner::where('business_id', $businessId)
            ->where('owner_id', $vehicleOwner->owner_id)
            ->orderBy('date', 'desc');

        if ($request->filled('from_date')) {
            $query->whereDate('date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->whereDate('date', '<=', $request->input('to_date'));
        }

        $payments = $query->paginate(15)->withQueryString();

        $totalPaid = (clone $query)->sum('paid_amnt');

        return view('Manager.OwnerPayments', [
            'vehicleOwner' => $vehicleOwner,
            'payments'     => $payments,
            'totalPaid'    => $totalPaid,
        ]);
    }




    #Acc Middlewear Functions

    public function accindex(Request $request)
    {
        $businessId = Auth::user()->business_id;

        // Start the query scoped by business_id
        $query = VehicleOwner::where('business_id', $businessId);

        // Filter by Full Name if provided
        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }

        // Filter by Vehicle Number if provided
        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', '%' . $request->input('vehicle_number') . '%');
        }

        // Get the filtered vehicle owners
        $vehicleOwners = $query->get();

        return view('Acc.VehicleOwners', compact('vehicleOwners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function acccreate()
    {
        return view('Acc.AddVehicleOwner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function accstore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
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

        // Attach business_id
        $validated['business_id'] = Auth::user()->business_id;

        // Create the vehicle owner
        VehicleOwner::create($validated);

        return redirect()->route('acc.vehicle_owners.index')->with('success', 'Vehicle owner created successfully.');
    }


    /**
     * Display the specified resource for Accounts users with payment summary.
     */
    public function accshow(Request $request, VehicleOwner $vehicleOwner)
    {
        $businessId = Auth::user()->business_id;

        // Determine date range (defaults to current month)
        $fromDate = $request->filled('from_date')
            ? Carbon::parse($request->input('from_date'))->startOfDay()
            : Carbon::now()->startOfMonth();

        $toDate = $request->filled('to_date')
            ? Carbon::parse($request->input('to_date'))->endOfDay()
            : Carbon::now()->endOfMonth();

        // Total paid amount for this owner within selected period
        $paidThisPeriod = PaidOwner::where('business_id', $businessId)
            ->where('owner_id', $vehicleOwner->owner_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->sum('paid_amnt');

        $monthlyRent = $vehicleOwner->rental_amnt;
        $dueThisPeriod = max($monthlyRent - $paidThisPeriod, 0);

        return view('Acc.DetailedVehicleOwner', [
            'vehicleOwner'   => $vehicleOwner,
            'paidThisPeriod' => $paidThisPeriod,
            'monthlyRent'    => $monthlyRent,
            'dueThisPeriod'  => $dueThisPeriod,
            'fromDate'       => $fromDate,
            'toDate'         => $toDate,
        ]);
    }

    /**
     * List all payments for a specific owner (Accounts module).
     */
    public function accPayments(Request $request, VehicleOwner $vehicleOwner)
    {
        $businessId = Auth::user()->business_id;

        $query = PaidOwner::where('business_id', $businessId)
            ->where('owner_id', $vehicleOwner->owner_id)
            ->orderBy('date', 'desc');

        if ($request->filled('from_date')) {
            $query->whereDate('date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->whereDate('date', '<=', $request->input('to_date'));
        }

        $payments = $query->paginate(15)->withQueryString();

        $totalPaid = (clone $query)->sum('paid_amnt');

        return view('Acc.OwnerPayments', [
            'vehicleOwner' => $vehicleOwner,
            'payments'     => $payments,
            'totalPaid'    => $totalPaid,
        ]);
    }






    #Emp Functions


    public function empindex(Request $request)
    {
        $businessId = Auth::user()->business_id;

        // Start the query scoped by business_id
        $query = VehicleOwner::where('business_id', $businessId);

        // Filter by Full Name if provided
        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }

        // Filter by Vehicle Number if provided
        if ($request->filled('vehicle_number')) {
            $query->where('vehicle_number', 'LIKE', '%' . $request->input('vehicle_number') . '%');
        }

        // Get the filtered vehicle owners
        $vehicleOwners = $query->get();

        return view('Employee.VehicleOwners', compact('vehicleOwners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function empcreate()
    {
        return view('Employee.AddVehicleOwner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function empstore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'vehicle_number' => 'required',
            'vehicle_name' => 'nullable',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'rental_amnt' => 'required|numeric',
            'monthly_km' => 'required|numeric',
            'extra_km_chg' => 'required|numeric',
            'emp_no' => 'nullable|string|max:255',
            'bank_detais' => 'nullable|string',
        ]);

        // Attach business_id
        $validated['business_id'] = Auth::user()->business_id;

        // Create the vehicle owner
        VehicleOwner::create($validated);

        return redirect()->route('emp.vehicle_owners.index')->with('success', 'Vehicle owner created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function empshow(VehicleOwner $vehicleOwner)
    {
        return view('Employee.DetailedVehicleOwner', compact('vehicleOwner'));
    }

}
