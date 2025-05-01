<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class LeaveApiController extends Controller
{
    public function index()
    {
        $businessId = Auth::user()->business_id;
        $leaves = Leave::where('business_id', $businessId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($leaves);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'type' => 'required|in:0,1,2',
            'reason' => 'nullable|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'leave_days' => 'required|numeric',
        ]);

        $validated['business_id'] = Auth::user()->business_id;
        $leave = Leave::create($validated);

        return response()->json(['message' => 'Leave request submitted', 'leave' => $leave], 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');

        $leave = Leave::findOrFail($id);
        if (!in_array($status, ['accepted', 'rejected'])) {
            return response()->json(['error' => 'Invalid status'], 422);
        }

        $leave->status = $status;

        if ($status === 'accepted') {
            $employee = Employee::where('emp_id', $leave->emp_id)->first();
            if (!$employee) {
                return response()->json(['error' => 'Employee not found'], 404);
            }

            if ($employee->remaining_leaves >= $leave->leave_days) {
                $employee->remaining_leaves -= $leave->leave_days;
                $employee->save();
            } else {
                return response()->json(['error' => 'Not enough remaining leaves'], 400);
            }
        }

        $leave->save();
        return response()->json(['message' => 'Leave status updated']);
    }

    public function showApproved()
    {
        $businessId = Auth::user()->business_id;
        $leaves = Leave::where('status', 'accepted')
            ->where('business_id', $businessId)
            ->get();

        return response()->json($leaves);
    }

    public function showRejected()
    {
        $businessId = Auth::user()->business_id;
        $leaves = Leave::where('status', 'rejected')
            ->where('business_id', $businessId)
            ->get();

        return response()->json($leaves);
    }
}
