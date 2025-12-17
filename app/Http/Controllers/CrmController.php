<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrmController extends Controller
{
    /**
     * Display a listing of the CRMs.
     */
    public function index()
    {
        $businessId = Auth::user()->business_id; // Get the logged-in user's business ID

        $crms = crm::where('business_id', $businessId)->get(); // Filter by business_id
        return view('Manager.NewCRM', compact('crms'));
    }

    /**
     * Show the form for creating a new CRM entry.
     */
    public function create()
    {
        return view('Manager.NewAddCRM');
    }

    /**
     * Store a newly created CRM in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);
        $businessId = Auth::user()->business_id;

        // Crm::create($request->all());


        Crm::create([
            'business_id' => $businessId,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'date' => $request->date,
            'subject' => $request->subject,
            'note' => $request->note,
        ]);

        return redirect()->route('crms.upcoming')->with('success', 'CRM entry created successfully.');
    }

    /**
     * Display the specified CRM entry.
     */
    public function show(Crm $crm)
    {
        return view('crms.show', compact('crm'));
    }

    /**
     * Show the form for editing the specified CRM entry.
     */
    public function edit(Crm $crm)
    {
        return view('Manager.NewEditCRM', compact('crm'));
    }

    /**
     * Update the specified CRM in storage.
     */
    public function update(Request $request, Crm $crm)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date' => 'required|date',
            'phone' => 'required',
            'subject' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $crm->update($request->all());

        return redirect()->route('crms.upcoming')->with('success', 'CRM entry updated successfully.');
    }

    /**
     * Remove the specified CRM from storage.
     */
    public function destroy(Crm $crm)
    {
        $crm->delete();

        return redirect()->route('crms.upcoming')->with('success', 'CRM entry deleted successfully.');
    }

    public function upcomingSchedule(Request $request)
    {
        $businessId = Auth::user()->business_id;

        $query = Crm::where('business_id', $businessId);

        // Apply filters if present
        if ($request->filled('full_name')) {
            $query->where('full_name', 'like', '%' . $request->input('full_name') . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date', '=', $request->input('date'));
        }

        // Fetch filtered results
        $crms = $query->orderBy('date', 'asc')->get();

        return view('Manager.NewCRM', compact('crms'));
    }
}
