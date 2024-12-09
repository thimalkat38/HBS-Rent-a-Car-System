<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CrmController;
// use App\Models\Employee;

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




// Customer Control CRUD Routes
Route::middleware(['manager'])->get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::middleware(['manager'])->get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::middleware(['manager'])->post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::middleware(['manager'])->get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::middleware(['manager'])->put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::middleware(['manager'])->delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');






// Vehicle Control CRUD Routes
Route::middleware(['manager'])->get('/addvehicle', [VehicleController::class, 'create'])->name('addvehicle');
Route::middleware(['manager'])->post('manager/addvehicle', [VehicleController::class, 'store'])->name('manager.storevehicle');
Route::middleware(['manager'])->get('/manager/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::middleware(['manager'])->post('manager/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::middleware(['manager'])->get('/manager/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::middleware(['manager'])->put('/manager/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::middleware(['manager'])->delete('/manager/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::middleware(['manager'])->get('vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');







// Booking Control CRUD Routes
Route::middleware(['manager'])->get('bookings', [BookingController::class, 'index'])->name('bookings.index'); // List all bookings
Route::middleware(['manager'])->get('bookings/create', [BookingController::class, 'create'])->name('bookings.create'); // Show form to create a booking
Route::middleware(['manager'])->post('bookings', [BookingController::class, 'store'])->name('bookings.store'); // Store new booking
Route::middleware(['manager'])->get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Show form to edit a booking
Route::middleware(['manager'])->put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update'); // Update booking
Route::middleware(['manager'])->delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy'); // Delete booking
Route::middleware(['manager'])->get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::middleware(['manager'])->get('/manager/dashboard', [BookingController::class, 'calendarView'])->name('manager.dashboard');



//Other functionality routes
// Route::middleware(['manager'])->get('/vehicles/search', [VehicleController::class, 'search'])->name('vehicles.search');
Route::middleware(['manager'])->get('/vehicles/get-details/{vehicle_number}', [VehicleController::class, 'getDetails'])->name('vehicles.getDetails');
Route::middleware(['manager'])->get('/customers/search', [CustomerController::class, 'search']);
Route::middleware(['manager'])->get('customers/{id}', [CustomerController::class, 'show'])->name('Customer.show');
Route::middleware(['manager'])->get('/customers/get-details/{id}', [CustomerController::class, 'getCustomerDetails']);
Route::middleware(['manager'])->get('/get-vehicle-models', [VehicleController::class, 'getVehicleModels'])->name('getVehicleModels');




//Home Route
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['admin'])->get('admin/dashboard', [HomeController::class, 'adminDash']);







// Inventory Control CRUD Routes
Route::middleware(['manager'])->get('inventory', [InventoryController::class, 'index'])->name('inventory.index'); // Display all inventory items
Route::middleware(['manager'])->get('inventory/create', [InventoryController::class, 'create'])->name('inventory.create'); // Show form to create a new item
Route::middleware(['manager'])->post('inventory', [InventoryController::class, 'store'])->name('inventory.store'); // Store a new item
Route::middleware(['manager'])->get('inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit'); // Show form to edit an existing item
Route::middleware(['manager'])->put('inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update'); // Update an existing item
Route::middleware(['manager'])->delete('inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy'); // Delete an item



Route::middleware(['manager'])->get('hr-management', function () {
    return view('Manager.HRManagment');
})->name('hrmanagement');



// Employee Control CRUD Routes
Route::middleware(['manager'])->get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::middleware(['manager'])->get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::middleware(['manager'])->post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::middleware(['manager'])->get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::middleware(['manager'])->put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::middleware(['manager'])->delete('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::middleware(['manager'])->get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
Route::middleware(['manager'])->get('employees/{id}', [EmployeeController::class, 'show'])->name('Employee.show');






// Leave Control CRUD Routes
Route::middleware(['manager'])->get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
Route::middleware(['manager'])->get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
Route::middleware(['manager'])->post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
Route::middleware(['manager'])->get('/leaves/{id}', [LeaveController::class, 'show'])->name('leaves.show');
Route::middleware(['manager'])->get('/leaves/{id}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
Route::middleware(['manager'])->put('/leaves/{id}', [LeaveController::class, 'update'])->name('leaves.update');
Route::middleware(['manager'])->delete('/leaves/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
Route::middleware(['manager'])->patch('/leaves/{id}/status/{status}', [LeaveController::class, 'updateStatus'])->name('leaves.updateStatus');
Route::middleware(['manager'])->get('approved', [LeaveController::class, 'showApprovedLeaves'])->name('leaves.approved');
Route::middleware(['manager'])->get('rejected', [LeaveController::class, 'showRejectededLeaves'])->name('leaves.rejected');







// Payroll Control CRUD Routes
Route::middleware(['manager'])->get('/payrolls', [PayrollController::class, 'index'])->name('payrolls.index');
Route::middleware(['manager'])->get('/payrolls/create', [PayrollController::class, 'create'])->name('payrolls.create');
Route::middleware(['manager'])->post('/payrolls', [PayrollController::class, 'store'])->name('payrolls.store');
Route::middleware(['manager'])->get('/payrolls/{id}', [PayrollController::class, 'show'])->name('payrolls.show');
Route::middleware(['manager'])->get('/payrolls/{id}/edit', [PayrollController::class, 'edit'])->name('payrolls.edit');
Route::middleware(['manager'])->put('/payrolls/{id}', [PayrollController::class, 'update'])->name('payrolls.update');
Route::middleware(['manager'])->delete('/payrolls/{id}', [PayrollController::class, 'destroy'])->name('payrolls.destroy');



// Attendances Control CRUD Routes
Route::middleware(['manager'])->get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index'); // List all records
Route::middleware(['manager'])->get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create'); // Show form
Route::middleware(['manager'])->post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store'); // Store data
Route::middleware(['manager'])->get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit'); // Edit form
Route::middleware(['manager'])->put('/attendances/{id}', [AttendanceController::class, 'update'])->name('attendances.update'); // Update data
Route::middleware(['manager'])->delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy'); // Delete data





// CRMs Control CRUD Routes
Route::middleware(['manager'])->get('/crms', [CrmController::class, 'index'])->name('crms.index');
Route::middleware(['manager'])->get('/crms/create', [CrmController::class, 'create'])->name('crms.create');
Route::middleware(['manager'])->post('/crms', [CrmController::class, 'store'])->name('crms.store');
Route::middleware(['manager'])->get('/crms/{crm}', [CrmController::class, 'show'])->name('crms.show');
Route::middleware(['manager'])->get('/crms/{crm}/edit', [CrmController::class, 'edit'])->name('crms.edit');
Route::middleware(['manager'])->put('/crms/{crm}', [CrmController::class, 'update'])->name('crms.update');
Route::middleware(['manager'])->delete('/crms/{crm}', [CrmController::class, 'destroy'])->name('crms.destroy');
Route::middleware(['manager'])->get('/crms', [CrmController::class, 'upcomingSchedule'])->name('crms.upcoming');


Route::get('manager/vehicles', [VehicleController::class, 'search'])->name('vehicles.search');