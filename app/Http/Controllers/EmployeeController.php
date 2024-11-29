<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Show a list of all employees.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('Manager.ManagerEmployees', compact('employees'));
    }
    
    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('Manager.AddEmp');
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'emp_name' => 'required|string|max:255',
            'nic' => 'required|string|max:20|unique:employees,nic',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|email|unique:employees,email',
            'address' => 'required|string|max:255',
            'join_date' => 'required|date',
            'birthday' => 'nullable|date',
            'remaining_leaves' => 'required|integer|min:0',
            'photo.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Auto-generate emp_id
        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $nextId = $lastEmployee ? $lastEmployee->id + 1 : 1;
        $empId = 'Emp' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    
        // Handle file uploads
        $photoPaths = [];
        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $photo) {
                $photoPaths[] = $photo->store('employee_photos', 'public');
            }
        }
    
        // Create Employee
        Employee::create([
            'emp_id' => $empId,
            'title' => $request->title,
            'emp_name' => $request->emp_name,
            'nic' => $request->nic,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'join_date' => $request->join_date,
            'age' => $this->calculateAge($request->birthday),
            'remaining_leaves' => $request->remaining_leaves,
            'photo' => $photoPaths,
        ]);
    
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }
        
    /**
     * Show the form for editing the specified employee.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Manager.EditEmployee', compact('employee'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'emp_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'join_date' => 'required|date',
            'email' => 'required|email',
            'age' => 'required',
            'nic' => 'required|string|max:12',
            'address' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $employee = Employee::findOrFail($id);
    
        $employee->update($request->only(['emp_name', 'mobile_number', 'join_date', 'email', 'age', 'nic', 'address']));
    
        if ($request->hasFile('images')) {
            // Handle file upload logic
            foreach ($request->file('images') as $file) {
                $path = $file->store('employees', 'public');
                $employee->images()->create(['path' => $path]);
            }
        }
    
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
    
    /**
     * Remove the specified employee from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Delete associated photos
        if ($employee->photo) {
            foreach ($employee->photo as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }

    /**
     * Calculate age from birthday.
     */
    private function calculateAge($birthday)
    {
        if ($birthday) {
            // Convert the birthday string into a DateTime object
            $birthdayDate = new \DateTime($birthday);
            $currentDate = new \DateTime(); // Get the current date
    
            // Calculate the difference in years
            $age = $currentDate->diff($birthdayDate)->y;
    
            return $age; // Return the whole number of years
        }
    
        return null;
    }
    
    public function search(Request $request)
{
    $query = $request->get('query', '');
    $employees = Employee::where('emp_id', 'like', "%$query%")
        ->orWhere('emp_name', 'like', "%$query%")
        ->select('emp_id', 'emp_name')
        ->get();
    
    return response()->json($employees);
}

}
