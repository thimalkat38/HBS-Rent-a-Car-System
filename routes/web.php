<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
// use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes for profiles
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__ . '/auth.php';



Route::middleware(['manager'])->get('manager/addbook', [HomeController::class, 'manageraddbook']);
Route::middleware(['manager'])->get('manager/dashboard', [HomeController::class, 'managerDash']);




// Display a listing of all customers
Route::middleware(['manager'])->get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// Show the form for creating a new customer
Route::middleware(['manager'])->get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Store a newly created customer in the database
Route::middleware(['manager'])->post('/customers', [CustomerController::class, 'store'])->name('customers.store');


// Show the form for editing the specified customer
Route::middleware(['manager'])->get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// Update the specified customer in the database
Route::middleware(['manager'])->put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

// Remove the specified customer from the database
Route::middleware(['manager'])->delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');






// Route::get('/addvehicle', [VehicleController::class, 'create'])->name('addvehicle');
Route::middleware(['manager'])->get('/addvehicle', [VehicleController::class, 'create'])->name('addvehicle');

Route::middleware(['manager'])->post('manager/addvehicle', [VehicleController::class, 'store'])->name('manager.storevehicle');
Route::middleware(['manager'])->get('/manager/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::middleware(['manager'])->post('manager/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::middleware(['manager'])->get('/manager/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::middleware(['manager'])->put('/manager/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::middleware(['manager'])->delete('/manager/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::middleware(['manager'])->get('vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');







// CRUD routes for Bookings
Route::middleware(['manager'])->get('bookings', [BookingController::class, 'index'])->name('bookings.index'); // List all bookings
Route::middleware(['manager'])->get('bookings/create', [BookingController::class, 'create'])->name('bookings.create'); // Show form to create a booking
Route::middleware(['manager'])->post('bookings', [BookingController::class, 'store'])->name('bookings.store'); // Store new booking
Route::middleware(['manager'])->get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Show form to edit a booking
Route::middleware(['manager'])->put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update'); // Update booking
Route::middleware(['manager'])->delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy'); // Delete booking
Route::middleware(['manager'])->get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');




Route::middleware(['manager'])->get('/vehicles/search', [VehicleController::class, 'search'])->name('vehicles.search');
Route::middleware(['manager'])->get('/vehicles/get-details/{vehicle_number}', [VehicleController::class, 'getDetails'])->name('vehicles.getDetails');
Route::middleware(['manager'])->get('/customers/search', [CustomerController::class, 'search']);
Route::middleware(['manager'])->get('customers/{id}', [CustomerController::class, 'show'])->name('Customer.show');
Route::middleware(['manager'])->get('/customers/get-details/{id}', [CustomerController::class, 'getCustomerDetails']);
Route::get('/get-vehicle-models', [VehicleController::class, 'getVehicleModels'])->name('getVehicleModels');




//Home Route
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['admin'])->get('admin/dashboard', [HomeController::class,'adminDash']);





Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index'); // Display all inventory items
Route::get('inventory/create', [InventoryController::class, 'create'])->name('inventory.create'); // Show form to create a new item
Route::post('inventory', [InventoryController::class, 'store'])->name('inventory.store'); // Store a new item
Route::get('inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit'); // Show form to edit an existing item
Route::put('inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update'); // Update an existing item
Route::delete('inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy'); // Delete an item



Route::get('hr-management', function () { return view('Manager.HRManagment');})->name('hrmanagement');
// Route::get('addemp', function () { return view('Manager.AddEmp');})->name('addemp');
Route::get('emp', function () { return view('Manager.ManagerEmployees');})->name('emp');
Route::get('leavereq', function () { return view('Manager.LeaveRequest');})->name('leavereq');
Route::get('addleavereq', function () { return view('Manager.AddLeaveReq');})->name('addleavereq');
// Route::get('approvedleave', function () { return view('Manager.ApprovedLeaves');})->name('approvedleave');
Route::get('rejectedleave', function () { return view('Manager.RejectedLeaves');})->name('rejectedleave');
Route::get('payroll', function () { return view('Manager.Payroll');})->name('payroll');
Route::get('addpayroll', function () { return view('Manager.AddPayroll');})->name('addpayroll');
Route::get('attendance', function () { return view('Manager.Attendance');})->name('attendance');
Route::get('addattendance', function () { return view('Manager.AddAttendance');})->name('addattendance');



Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');





// View all leave requests
Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
Route::get('/leaves/{id}', [LeaveController::class, 'show'])->name('leaves.show');
Route::get('/leaves/{id}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
Route::put('/leaves/{id}', [LeaveController::class, 'update'])->name('leaves.update');
Route::delete('/leaves/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
Route::patch('/leaves/{id}/status/{status}', [LeaveController::class, 'updateStatus'])->name('leaves.updateStatus');
Route::get('approved', [LeaveController::class, 'showApprovedLeaves'])->name('leaves.approved');
Route::get('rejected', [LeaveController::class, 'showRejectededLeaves'])->name('leaves.rejected');







//Other routes


// Admin routes (with 'auth' and 'admin' middleware)
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [HomeController::class,'adminDash']);
//     Route::get('/addvehicle', [HomeController::class,'adminaddvehi']);
//     Route::get('/vehicles', [HomeController::class,'adminvehi']);
//     Route::get('/addbook', [HomeController::class,'adminaddbook']);
//     // Route::get('/books', [HomeController::class,'adminbook']);
//     Route::get('/addcus', [HomeController::class,'adminaddcus']);
//     Route::get('/cus', [HomeController::class,'admincus']);
//     Route::get('/addemp', [HomeController::class,'adminaddemp']);
//     Route::get('/emp', [HomeController::class,'adminemp']);
// });


// Manager routes (with 'auth' and 'manager' middleware)
// Route::get('/books', [HomeController::class,'managerbook']);
// Route::get('/addcus', [HomeController::class,'manageraddcus']);
// Route::get('/addemp', [HomeController::class,'manageraddemp']);
// Route::get('/emp', [HomeController::class,'manageremp']);
// Route::get('/addvehicle', [HomeController::class,'manageraddvehi']);
// Route::get('/vehicles', [HomeController::class,'managervehi'])
// Route::get('/cus', [HomeController::class,'managercus']);

// Customer resource routes
// Route::resource('customers', CustomerController::class);


// Display the specified customer
// Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
