<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $businesses = Business::where('Business_number', 'LIKE', "%{$search}%")->get();
        } else {
            $businesses = Business::all();
        }

        return view('SuperAdmin.Dashboard', compact('businesses', 'search'));
    }
    public function search(Request $request)
    {
        $query = Business::query();

        if ($request->filled('b_name')) {
            $query->where('b_name', 'LIKE', "%{$request->b_name}%");
        }

        if ($request->filled('o_name')) {
            $query->where('o_name', 'LIKE', "%{$request->o_name}%");
        }

        if ($request->filled('reg_date')) {
            $query->where('reg_date', $request->reg_date);
        }


        // Retrieve matching vehicles
        $businesses = $query->get();

        return view('SuperAdmin.Dashboard', compact('businesses'));
    }

    public function adminDash()
    {
        return view('./Admin/AdminDashboard');
    }

    public function adminaddvehi()
    {
        return view('./Admin/AdminAddVehicle');
    }
    public function adminvehi()
    {
        return view('./Admin/AdminVehicles');
    }
    public function adminaddbook()
    {
        return view('./Admin/AdminAddBooking');
    }
    public function adminbook()
    {
        return view('./Admin/AdminBookings');
    }
    public function adminaddcus()
    {
        return view('./Admin/AdminAddCustomer');
    }
    public function admincus()
    {
        return view('./Admin/AdminCustomers');
    }
    public function adminaddemp()
    {
        return view('./Admin/AdminAddEmployee');
    }
    public function adminemp()
    {
        return view('./Admin/AdminEmployees');
    }





    public function managerDash()
    {
        return view('./Manager/ManagerDashboard');
    }

    public function manageraddvehi()
    {
        return view('./Manager/ManagerAddVehicle');
    }
    // public function managervehi(){
    //     return view('./Manager/ManagerVehicles');
    // }
    public function manageraddbook()
    {
        return view('./Manager/ManagerAddBooking');
    }
    public function managerbook()
    {
        return view('./Manager/ManagerBookings');
    }
    public function manageraddcus()
    {
        return view('./Manager/ManagerAddCustomer');
    }
    public function managercus()
    {
        return view('./Manager/ManagerCustomers');
    }
    public function manageraddemp()
    {
        return view('./Manager/ManagerAddEmployee');
    }
    public function manageremp()
    {
        return view('./Manager/ManagerEmployees');
    }
}
