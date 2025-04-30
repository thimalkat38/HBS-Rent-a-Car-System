<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    // Display a listing of attendance records
    public function index(Request $request)
    {
        $monthInput = $request->input('month') ?? Carbon::now()->format('Y-m');

        $month = Carbon::parse($monthInput);

        // Get the business_id of the currently logged-in user
        $businessId = Auth::user()->business_id;

        $query = DB::table('attendances')
            ->select(
                'emp_id',
                'emp_name',
                DB::raw("SUM(CASE WHEN type = 'Normal' THEN 1 ELSE 0 END) as normal_days"),
                DB::raw("SUM(CASE WHEN type = 'Half Day' THEN 1 ELSE 0 END) as half_days"),
                DB::raw("SUM(CASE WHEN type = 'Leave' THEN 1 ELSE 0 END) as leave_days")
            )
            ->whereMonth('date', $month->month)
            ->whereYear('date', $month->year)
            ->groupBy('emp_id', 'emp_name');

        if ($request->filled('emp_name')) {
            $query->where('emp_name', 'like', '%' . $request->emp_name . '%');
        }

        $attendances = $query->get();

        return view('Manager.Attendance', compact('attendances', 'monthInput'));
    }




    // Show the form for creating a new attendance record
    public function create()
    {
        $businessId = \Illuminate\Support\Facades\Auth::user()?->business_id;
    
        // Fetch employees belonging to the logged-in user's business
        $employees = Employee::where('business_id', $businessId)->get();
    
        return view('Manager.AddAttendance', compact('employees'));
    }


    // Store a newly created attendance record
    public function store($id, $type)
    {
        $employee = Employee::findOrFail($id);

        $today = Carbon::today()->toDateString();

        // Check if attendance already marked for today
        $existing = Attendance::where('emp_id', $employee->emp_id)
            ->where('date', $today)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Attendance Already Marked for Today');
        }

        Attendance::create([
            'emp_id'    => $employee->emp_id,
            'emp_name'  => $employee->emp_name,
            'date'      => $today,
            'type'      => $type,
            'business_id'  => Auth::user()->business_id,
        ]);

        return redirect()->back()->with('success', 'Attendance Marked Successfully');
    }

    // Remove the specified attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully!');
    }
}
