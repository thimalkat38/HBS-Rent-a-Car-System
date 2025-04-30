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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostBookingController;
use App\Http\Controllers\VehicleOwnerController;
use App\Http\Controllers\OwnerpaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProfitLossController;
use App\Http\Controllers\BusinessController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes for profiles
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__ . '/auth.php';









// Customer Control CRUD Routes
Route::middleware(['manager'])->get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::middleware(['manager'])->get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::middleware(['manager'])->post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::middleware(['manager'])->get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::middleware(['manager'])->put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::middleware(['manager'])->delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::middleware(['manager'])->get('/customers/searchb', [CustomerController::class, 'search']);
Route::middleware(['manager'])->get('customers/{id}', [CustomerController::class, 'show'])->name('Customer.show');
Route::middleware(['manager'])->get('/customers/get-details/{id}', [CustomerController::class, 'getCustomerDetails']);
Route::middleware(['manager'])->get('/customers/search', [CustomerController::class, 'searche'])->name('customers.search');



// Vehicle Control CRUD Routes
Route::middleware(['manager'])->get('/addvehicle', [VehicleController::class, 'create'])->name('addvehicle');
Route::middleware(['manager'])->post('manager/addvehicle', [VehicleController::class, 'store'])->name('manager.storevehicle');
Route::middleware(['manager'])->get('/manager/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::middleware(['manager'])->put('/manager/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::middleware(['manager'])->delete('/manager/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::middleware(['manager'])->get('vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::middleware(['manager'])->get('/vehicle/{id}/renew-docs', [VehicleController::class, 'renewDocs'])->name('vehicle.renewDocs');
Route::middleware(['manager'])->get('/vehicles/get-details/{vehicle_number}', [VehicleController::class, 'getDetails'])->name('vehicles.getDetails');
Route::middleware(['manager'])->get('/get-vehicle-models', [VehicleController::class, 'getVehicleModels'])->name('getVehicleModels');
Route::middleware(['manager'])->get('manager/vehicles', [VehicleController::class, 'search'])->name('vehicles.search');
Route::middleware(['manager'])->get('/autocomplete-vehicle-models', [VehicleController::class, 'autocomplete']);
Route::middleware(['manager'])->get('/autocomplete-vehicle-numbers', [VehicleController::class, 'autocompleteVehicleNumber']);
Route::middleware(['manager'])->get('/get-vehicle-numbers', [VehicleController::class, 'getVehicleNumbers']);
Route::middleware(['manager'])->get('/api/vehicles/search', [VehicleController::class, 'searchVehicles'])->name('api.vehicles.search');




// Booking Control CRUD Routes
Route::middleware(['manager'])->get('bookings', [BookingController::class, 'index'])->name('bookings.index'); // List all bookings
Route::middleware(['manager'])->get('bookings/create', [BookingController::class, 'create'])->name('bookings.create'); // Show form to create a booking
Route::middleware(['manager'])->post('bookings', [BookingController::class, 'store'])->name('bookings.store'); // Store new booking
Route::middleware(['manager'])->get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Show form to edit a booking
Route::middleware(['manager'])->put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update'); // Update booking
Route::middleware(['manager'])->delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy'); // Delete booking
Route::middleware(['manager'])->get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::middleware(['manager'])->post('/bookings/{id}/complete', [BookingController::class, 'markAsCompleted'])->name('bookings.complete');
Route::middleware(['manager'])->get('/bookings/{id}/postbooking', [BookingController::class, 'postBooking'])->name('bookings.postbooking');



// Inventory Control CRUD Routes
Route::middleware(['manager'])->get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::middleware(['manager'])->get('inventory/create', [InventoryController::class, 'create'])->name('inventory.create'); // Show form to create a new item
Route::middleware(['manager'])->post('inventory', [InventoryController::class, 'store'])->name('inventory.store'); // Store a new item
Route::middleware(['manager'])->get('inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit'); // Show form to edit an existing item
Route::middleware(['manager'])->put('inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update'); // Update an existing item
Route::middleware(['manager'])->delete('inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy'); // Delete an item



// Employee Control CRUD Routes
Route::middleware(['manager'])->get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::middleware(['manager'])->get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::middleware(['manager'])->post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::middleware(['manager'])->get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::middleware(['manager'])->put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::middleware(['manager'])->delete('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::middleware(['manager'])->get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
Route::middleware(['manager'])->get('employees/{id}', [EmployeeController::class, 'show'])->name('Employee.show');
Route::middleware(['manager'])->get('/autocomplete-employees', [EmployeeController::class, 'autocomplete']);
Route::middleware(['manager'])->get('/employees/search', [EmployeeController::class, 'searche'])->name('employees.search');



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
Route::middleware(['manager'])->get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::middleware(['manager'])->get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create'); // Show form
Route::post('attendance/store/{id}/{type}', [AttendanceController::class, 'store'])->name('attendance.store');
Route::middleware(['manager'])->get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit'); // Edit form
Route::middleware(['manager'])->put('/attendances/{id}', [AttendanceController::class, 'update'])->name('attendances.update'); // Update data
Route::middleware(['manager'])->delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy'); // Delete data



// CRMs Control CRUD Routes
Route::middleware(['manager'])->get('/crms/create', [CrmController::class, 'create'])->name('crms.create');
Route::middleware(['manager'])->post('/crms', [CrmController::class, 'store'])->name('crms.store');
Route::middleware(['manager'])->get('/crms/{crm}', [CrmController::class, 'show'])->name('crms.show');
Route::middleware(['manager'])->get('/crms/{crm}/edit', [CrmController::class, 'edit'])->name('crms.edit');
Route::middleware(['manager'])->put('/crms/{crm}', [CrmController::class, 'update'])->name('crms.update');
Route::middleware(['manager'])->delete('/crms/{crm}', [CrmController::class, 'destroy'])->name('crms.destroy');
Route::middleware(['manager'])->get('/crms', [CrmController::class, 'upcomingSchedule'])->name('crms.upcoming');



// PostBookin Control Routes
Route::middleware(['manager'])->get('/postbookings', [PostBookingController::class, 'index'])->name('postbookings.index');
Route::middleware(['manager'])->get('/postbookings/create', [PostBookingController::class, 'create'])->name('postbookings.create');
Route::middleware(['manager'])->post('/postbookings', [PostBookingController::class, 'store'])->name('postbookings.store');
Route::middleware(['manager'])->get('/postbookings/{postBooking}', [PostBookingController::class, 'show'])->name('postbookings.show');
Route::middleware(['manager'])->get('/postbookings/{postBooking}/edit', [PostBookingController::class, 'edit'])->name('postbookings.edit');
Route::middleware(['manager'])->put('/postbookings/{postBooking}', [PostBookingController::class, 'update'])->name('postbookings.update');
Route::middleware(['manager'])->delete('/postbookings/{postBooking}', [PostBookingController::class, 'destroy'])->name('postbookings.destroy');



//Vehicle Owner Control Routes
Route::middleware(['manager'])->get('vehicle_owners', [VehicleOwnerController::class, 'index'])->name('vehicle_owners.index');
Route::middleware(['manager'])->get('vehicle_owners/create', [VehicleOwnerController::class, 'create'])->name('vehicle_owners.create');
Route::middleware(['manager'])->post('vehicle_owners', [VehicleOwnerController::class, 'store'])->name('vehicle_owners.store');
Route::middleware(['manager'])->get('vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'show'])->name('vehicle_owners.show');
Route::middleware(['manager'])->get('vehicle_owners/{vehicleOwner}/edit', [VehicleOwnerController::class, 'edit'])->name('vehicle_owners.edit');
Route::middleware(['manager'])->put('vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'update'])->name('vehicle_owners.update');
Route::middleware(['manager'])->delete('vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'destroy'])->name('vehicle_owners.destroy');



//Owner Payment Control Routes
Route::middleware(['manager'])->get('ownerpayments', [OwnerpaymentController::class, 'index'])->name('ownerpayments.index');
Route::middleware(['manager'])->get('ownerpayments/create', [OwnerpaymentController::class, 'create'])->name('ownerpayments.create');
Route::middleware(['manager'])->post('ownerpayments', [OwnerpaymentController::class, 'store'])->name('ownerpayments.store');
Route::middleware(['manager'])->get('ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'show'])->name('ownerpayments.show');
Route::middleware(['manager'])->get('ownerpayments/{ownerpayment}/edit', [OwnerpaymentController::class, 'edit'])->name('ownerpayments.edit');
Route::middleware(['manager'])->put('ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'update'])->name('ownerpayments.update');
Route::middleware(['manager'])->delete('ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'destroy'])->name('ownerpayments.destroy');



// Service Control Routes
Route::middleware(['manager'])->get('/services', [ServiceController::class, 'index'])->name('services.index'); 
Route::middleware(['manager'])->get('/services/create', [ServiceController::class, 'create'])->name('services.create'); // Show form to create a new service
Route::middleware(['manager'])->post('/services', [ServiceController::class, 'store'])->name('services.store'); // Store new service
Route::middleware(['manager'])->get('/services/{service}', [ServiceController::class, 'show'])->name('services.show'); // Show specific service
Route::middleware(['manager'])->get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Show form to edit service
Route::middleware(['manager'])->put('/services/{service}', [ServiceController::class, 'update'])->name('services.update'); // Update service
Route::middleware(['manager'])->delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Delete service



//Expenses Controll Routes
Route::middleware(['manager'])->get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::middleware(['manager'])->get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::middleware(['manager'])->post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
Route::middleware(['manager'])->get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
Route::middleware(['manager'])->get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::middleware(['manager'])->put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::middleware(['manager'])->delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
Route::middleware(['manager'])->get('/expenses/download/{id}', [ExpenseController::class, 'download'])->name('expenses.download');



//Business Control Routes
Route::middleware(['admin'])->get('addbus', [BusinessController::class, 'create'])->name('addbus');
Route::middleware(['admin'])->post('addbus', [BusinessController::class, 'store'])->name('storebus');
Route::middleware(['admin'])->get('bus/{id}', [BusinessController::class, 'show'])->name('buss.show');
Route::middleware(['admin'])->get('bus/{id}/edit', [BusinessController::class, 'edit'])->name('bus.edit');
Route::middleware(['admin'])->put('bus/{id}', [BusinessController::class, 'update'])->name('bus.update');
Route::middleware(['admin'])->delete('bus/{id}', [BusinessController::class, 'destroy'])->name('bus.destroy');



//User Control Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user/create', [App\Http\Controllers\UserManagementController::class, 'create'])->name('user.create');
    Route::get('/users', [App\Http\Controllers\UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user/store', [App\Http\Controllers\UserManagementController::class, 'store'])->name('user.store');
    Route::get('search/users', [App\Http\Controllers\UserManagementController::class, 'search'])->name('user.search');
    Route::delete('/users/{id}', [App\Http\Controllers\UserManagementController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/update-password', [App\Http\Controllers\UserManagementController::class, 'updatePassword'])->name('user.updatePassword');
});



//Home Routes and Other Routes
Route::middleware(['manager'])->get('/manager/dashboard', [DashboardController::class, 'calendarView'])->name('manager.dashboard');
Route::middleware(['manager'])->get('/manager/bookings', [DashboardController::class, 'getBookingsByDate']);
Route::middleware(['manager'])->get('hr-management', function () {return view('Manager.HRManagment');})->name('hrmanagement');
Route::middleware(['manager'])->get('/profit-loss-report', [ProfitLossController::class, 'index'])->name('profit.loss');
Route::middleware(['manager'])->post('/salary/store', [SalaryController::class, 'store'])->name('salary.store');
Route::middleware(['admin'])->get('superadmin', [HomeController::class, 'index'])->name('business.index');
Route::middleware(['admin'])->get('/superadmin', [HomeController::class, 'search'])->name('bus.search');
Route::middleware(['manager'])->get('manager/addbook', [HomeController::class, 'manageraddbook']);







Route::get('/link', function () {
    $source = storage_path('app/public');
    $destination = public_path('storage');

    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    function copyDirectory($source, $destination)
    {
        $directory = opendir($source);

        // Ensure destination directory exists
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        while (($file = readdir($directory)) !== false) {
            if ($file !== '.' && $file !== '..') {
                $srcFile = $source . DIRECTORY_SEPARATOR . $file;
                $destFile = $destination . DIRECTORY_SEPARATOR . $file;

                if (is_dir($srcFile)) {
                    // Recursively copy directories
                    copyDirectory($srcFile, $destFile);
                } else {
                    // Copy files
                    copy($srcFile, $destFile);
                }
            }
        }

        closedir($directory);
    }

    copyDirectory($source, $destination);

    return 'Files and directories copied to public/storage successfully.';
});






// Route::middleware(['manager'])->get('super', [BusinessController::class, 'index'])->name('business.index');
// Route::middleware(['manager'])->get('manager/dashboard', [HomeController::class, 'managerDash']);
// Route::middleware(['admin'])->get('admin/dashboard', [HomeController::class, 'adminDash']);
// Route::middleware(['manager'])->get('super', [BusinessController::class, 'index'])->name('business.index');
// Route::middleware(['admin'])->get('/super', [BusinessController::class, 'search'])->name('bus.search');
// Route::middleware(['manager'])->get('/crms', [CrmController::class, 'index'])->name('crms.index');
// Route::middleware(['manager'])->get('/vehicles/search', [VehicleController::class, 'search'])->name('vehicles.search');
// Route::middleware(['manager'])->get('/manager/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
// Route::middleware(['manager'])->post('manager/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['manager'])->get('postbooking', function () {
//     return view('Manager.PostBooking');
// })->name('postbooking');