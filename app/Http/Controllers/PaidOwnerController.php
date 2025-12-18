<?php

namespace App\Http\Controllers;

use App\Models\PaidOwner;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaidOwnerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'owner_id' => 'required|string|max:255',
            'vehicle' => 'required|string|max:255',
            'date' => 'required|date',
            'paid_amnt' => 'required|numeric|min:0',
            'bank_details' => 'nullable|string|max:255',
            'acc_no' => 'required|string|max:255',
        ]);

        $businessId = Auth::user()->business_id;

        // Save to paidowners table
        PaidOwner::create([
            'business_id' => $businessId,
            'owner_id' => $request->owner_id,
            'full_name' => $request->full_name,
            'vehicle' => $request->vehicle,
            'acc_no' => $request->acc_no,
            'bank_details' => $request->bank_details,
            'date' => $request->date,
            'paid_amnt' => $request->paid_amnt,
        ]);

        return redirect()->route('vehicle_owners.index')
            ->with('success', 'Owner payment saved successfully.');
    }
}
