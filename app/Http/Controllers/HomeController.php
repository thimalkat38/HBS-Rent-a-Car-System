<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDash(){
        return view('./Admin/AdminDashboard');
    }

    public function adminaddvehi(){
        return view('./Admin/AdminAddVehicle');
    }
    public function adminvehi(){
        return view('./Admin/AdminVehicles');
    }
    public function adminaddbook(){
        return view('./Admin/AdminAddBooking');
    }
    public function adminbook(){
        return view('./Admin/AdminBookings');
    }
    public function adminaddcus(){
        return view('./Admin/AdminAddCustomer');
    }
    public function admincus(){
        return view('./Admin/AdminCustomers');
    }
    public function adminaddemp(){
        return view('./Admin/AdminAddEmployee');
    }
    public function adminemp(){
        return view('./Admin/AdminEmployees');
    }



    

    public function managerDash(){
        return view('./Manager/ManagerDashboard');
    }

    public function manageraddvehi(){
        return view('./Manager/ManagerAddVehicle');
    }
    // public function managervehi(){
    //     return view('./Manager/ManagerVehicles');
    // }
    public function manageraddbook(){
        return view('./Manager/ManagerAddBooking');
    }
    public function managerbook(){
        return view('./Manager/ManagerBookings');
    }
    public function manageraddcus(){
        return view('./Manager/ManagerAddCustomer');
    }
    public function managercus(){
        return view('./Manager/ManagerCustomers');
    }
    public function manageraddemp(){
        return view('./Manager/ManagerAddEmployee');
    }
    public function manageremp(){
        return view('./Manager/ManagerEmployees');
}
}