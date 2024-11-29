<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    /**
     * Display a listing of the CRMs.
     */
    public function index()
    {
        $crms = Crm::all();
        return view('Manager.CRM', compact('crms'));
    }

    /**
     * Show the form for creating a new CRM entry.
     */
    public function create()
    {
        return view('Manager.AddCrm');
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

        Crm::create($request->all());

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
        return view('Manager.EditCrm', compact('crm'));
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
        $query = Crm::query();
    
        // Apply filters if present
        if ($request->filled('full_name')) {
            $query->where('full_name', 'like', '%' . $request->input('full_name') . '%');
        }
    
        if ($request->filled('date')) {
            $query->whereDate('date', '=', $request->input('date'));
        }
    
        // Fetch filtered results or all upcoming entries
        $crms = $query->orderBy('date', 'asc')->get();
    
        return view('Manager.CRM', compact('crms'));
    }
    

}
