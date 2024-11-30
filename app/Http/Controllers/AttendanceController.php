<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Display a listing of attendance records
    public function index(Request $request)
    {
        $query = Attendance::query();
    
        // Apply filters
        if ($request->has('emp_name') && $request->emp_name != '') {
            $query->where('emp_name', 'like', '%' . $request->emp_name . '%');
        }
        if ($request->has('date') && $request->date != '') {
            $query->where('date', $request->date);
        }
    
        $attendances = $query->get(); // Fetch the filtered results
    
        return view('Manager.Attendance', compact('attendances'));
    }
    
    

    // Show the form for creating a new attendance record
    public function create()
    {
        return view('Manager.AddAttendance');
    }

    // Store a newly created attendance record
    public function store(Request $request)
    {
        $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|string',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance record created successfully!');
    }

    // Show the form for editing the specified attendance record
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', compact('attendance'));
    }

    // Update the specified attendance record
    public function update(Request $request, $id)
    {
        $request->validate([
            'emp_id' => 'required|string|max:255',
            'emp_name' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|string',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully!');
    }

    // Remove the specified attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully!');
    }
    
    
}
