<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    // Display all leave requests
    public function index()
    {
        $businessId = Auth::user()->business_id;

        $leaves = Leave::where('business_id', $businessId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Manager.LeaveRequest', compact('leaves'));
    }



    // Show the form for creating a new leave request
    public function create()
    {
        return view('Manager.AddLeaveReq');
    }

    // Store a new leave request in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'type' => 'required|in:0,1,2',
            'reason' => 'nullable|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'leave_days' => 'required',
        ]);

        // Inject business_id
        $validated['business_id'] = Auth::user()->business_id;

        // Create leave with business ID
        Leave::create($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
    }



    // Show the details of a specific leave request
    public function show($id)
    {
        $leave = Leave::findOrFail($id);
        return view('leaves.show', compact('leave'));
    }

    // Show the form to edit a specific leave request
    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        return view('leaves.edit', compact('leave'));
    }

    // Update a specific leave request in the database
    public function update(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);

        $validated = $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'type' => 'required|in:0,1,2',
            'reason' => 'nullable|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'leave_days' => 'required',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $leave->update($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully.');
    }

    // Delete a specific leave request from the database
    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }

    public function updateStatus($id, $status)
    {
        $leave = Leave::findOrFail($id);

        if (in_array($status, [Leave::STATUS_ACCEPTED, Leave::STATUS_REJECTED])) {
            $leave->status = $status;

            if ($status === Leave::STATUS_ACCEPTED) {
                $employee = Employee::where('emp_id', $leave->emp_id)->first();

                if ($employee) {
                    // Use leave_days column to reduce remaining leaves
                    $leaveDays = $leave->leave_days;

                    if ($employee->remaining_leaves >= $leaveDays) {
                        $employee->remaining_leaves -= $leaveDays;
                        $employee->save();
                    } else {
                        return redirect()->route('leaves.index')->with('error', 'Employee does not have enough remaining leaves.');
                    }
                } else {
                    return redirect()->route('leaves.index')->with('error', 'Employee not found.');
                }
            }

            $leave->save();
            return redirect()->route('leaves.index')->with('success', 'Leave status updated successfully!');
        }

        return redirect()->route('leaves.index')->with('error', 'Invalid status update!');
    }





    public function showApprovedLeaves()
    {
        $businessId = Auth::user()->business_id;

        $approvedLeaves = Leave::where('status', 'accepted')
            ->where('business_id', $businessId)
            ->get();

        return view('Manager.ApprovedLeaves', compact('approvedLeaves'));
    }

    public function showRejectededLeaves()
    {
        $businessId = Auth::user()->business_id;

        $rejectedLeaves = Leave::where('status', 'rejected')
            ->where('business_id', $businessId)
            ->get();

        return view('Manager.RejectedLeaves', compact('rejectedLeaves'));
    }
}
