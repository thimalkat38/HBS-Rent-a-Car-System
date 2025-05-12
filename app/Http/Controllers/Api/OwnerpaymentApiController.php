<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Ownerpayment;
use App\Models\VehicleOwner;


class OwnerpaymentApiController extends Controller
{
    public function index(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Ownerpayment::where('business_id', $businessId);

        if ($request->filled('owner_id')) {
            $query->where('owner_id', $request->owner_id);
        }

        if ($request->filled('full_name')) {
            $query->where('full_name', 'LIKE', '%' . $request->full_name . '%');
        }

        $ownerpayments = $query->get();

        return response()->json($ownerpayments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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

        $vehicleOwner = VehicleOwner::where('owner_id', $validated['owner_id'])->first();

        if (!$vehicleOwner) {
            return response()->json(['error' => 'Vehicle owner not found'], 404);
        }

        $fullNameWithTitle = $vehicleOwner->title . ' ' . $vehicleOwner->full_name;
        $businessId = Auth::user()->business_id;

        $ownerpayment = Ownerpayment::create([
            'business_id' => $businessId,
            'full_name' => $fullNameWithTitle,
            'owner_id' => $validated['owner_id'],
            'vehicle' => $validated['vehicle'],
            'date' => $validated['date'],
            'paid_amnt' => $validated['paid_amnt'],
            'bank_details' => $validated['bank_details'] ?? null,
            'acc_no' => $validated['acc_no'],
            'receipt' => $receiptPaths,
        ]);

        $vehicleOwner->decrement('rem_rental', $validated['paid_amnt']);

        return response()->json([
            'message' => 'Owner payment created successfully.',
            'ownerpayment' => $ownerpayment
        ]);
    }

    public function update(Request $request, $id)
    {
        $ownerpayment = Ownerpayment::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'vehicle' => 'required|string|max:255',
            'date' => 'required|date',
            'paid_amnt' => 'required|numeric',
            'bank_details' => 'nullable|string|max:255',
            'acc_no' => 'required|string|max:255',
        ]);

        $ownerpayment->update($validated);

        return response()->json([
            'message' => 'Owner payment updated successfully.',
            'ownerpayment' => $ownerpayment
        ]);
    }

    public function destroy($id)
    {
        $ownerpayment = Ownerpayment::findOrFail($id);
        $ownerpayment->delete();

        return response()->json(['message' => 'Owner payment deleted successfully.']);
    }
}
