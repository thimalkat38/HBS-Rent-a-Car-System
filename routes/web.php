<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Models\Customer;
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
