<?php

namespace App\Http\Controllers;

use App\Models\Ownerpayment;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;

class OwnerpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ownerpayment::query();
    
        // Filter by owner_id if provided
        if ($request->filled('owner_id')) {
            $query->where('owner_id', $request->input('owner_id'));
        }
    
        // Additional filter by full_name if needed
        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('full_name') . '%');
        }
    
        $ownerpayments = $query->get();
    
        return view('Manager.AllOwnerPay', compact('ownerpayments'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicleOwners = VehicleOwner::select('id', 'full_name', 'title', 'owner_id', 'vehicle_number','acc_no','bank_detais')->get();
        return view('Manager.AddOwnerPay', compact('vehicleOwners'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'owner_id' => 'required|string|max:255',
            'vehicle' => 'required|string|max:255',
            'date' => 'required|date',
            'paid_amnt' => 'required|numeric',
            'bank_details' => 'nullable|string|max:255',
            'acc_no' => 'required|string|max:255',
            'receipt.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $receiptPaths = [];
    
        if ($request->hasFile('receipt')) {
            foreach ($request->file('receipt') as $receipt) {
                $receiptPaths[] = $receipt->store('Ownerpay_receipts', 'public');
            }
        }
    
        $vehicleOwner = VehicleOwner::where('owner_id', $request->owner_id)->first();
    
        if (!$vehicleOwner) {
            return back()->withErrors(['error' => 'Vehicle owner not found!']);
        }
    
        $fullNameWithTitle = $vehicleOwner->title . ' ' . $vehicleOwner->full_name;
    
        // Save owner payment
        Ownerpayment::create([
            'full_name' => $fullNameWithTitle,
            'owner_id' => $request->owner_id,
            'vehicle' => $request->vehicle,
            'date' => $request->date,
            'paid_amnt' => $request->paid_amnt,
            'bank_details' => $request->bank_details,
            'acc_no' => $request->acc_no,
            'receipt' => $receiptPaths,
        ]);
    
        // Update remaining rental amount
        $vehicleOwner->decrement('rem_rental', $request->paid_amnt);
    
        return redirect()->route('vehicle_owners.index')->with('success', 'Owner payment created successfully.');
    }
    
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Ownerpayment $ownerpayment)
    {
        return view('ownerpayments.show', compact('ownerpayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ownerpayment $ownerpayment)
    {
        return view('Manager.EditOwnerPay', compact('ownerpayment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ownerpayment $ownerpayment)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'vehicle' => 'required|string|max:255',
            'date' => 'required|date',
            'paid_amnt' => 'required|string',
            'bank_details' => 'nullable|string|max:255',
            'acc_no' => 'required|string|max:255',
        ]);

        $ownerpayment->update($request->all());

        return redirect()->route('ownerpayments.index')
                         ->with('success', 'Owner payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ownerpayment $ownerpayment)
    {
        $ownerpayment->delete();

        return redirect()->route('ownerpayments.index')
                         ->with('success', 'Owner payment deleted successfully.');
    }
}
