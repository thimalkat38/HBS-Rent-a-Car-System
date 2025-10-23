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
})->name('login');

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
Route::middleware(['manager'])->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/customers/searchb', [CustomerController::class, 'search']);
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('Customer.show');
    Route::get('/customers/get-details/{id}', [CustomerController::class, 'getCustomerDetails']);
    Route::get('/customers/search', [CustomerController::class, 'searche'])->name('customers.search');
});

// Vehicle Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/addvehicle', [VehicleController::class, 'create'])->name('addvehicle');
    Route::post('/manager/addvehicle', [VehicleController::class, 'store'])->name('manager.storevehicle');
    Route::get('/manager/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/manager/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/manager/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
    Route::get('/vehicle/{id}/renew-docs', [VehicleController::class, 'renewDocs'])->name('vehicle.renewDocs');
    Route::get('/vehicles/get-details/{vehicle_number}', [VehicleController::class, 'getDetails'])->name('vehicles.getDetails');
    Route::get('/get-vehicle-models', [VehicleController::class, 'getVehicleModels'])->name('getVehicleModels');
    Route::get('/manager/vehicles', [VehicleController::class, 'search'])->name('vehicles.search');
    Route::get('/autocomplete-vehicle-models', [VehicleController::class, 'autocomplete']);
    Route::get('/autocomplete-vehicle-numbers', [VehicleController::class, 'autocompleteVehicleNumber']);
    Route::get('/get-vehicle-numbers', [VehicleController::class, 'getVehicleNumbers']);
    Route::get('/api/vehicles/search', [VehicleController::class, 'searchVehicles'])->name('api.vehicles.search');
    Route::get('/allvehicles', [VehicleController::class, 'index'])->name('vehicles.index');
});

// Booking Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{id}/complete', [BookingController::class, 'markAsCompleted'])->name('bookings.complete');
    Route::get('/bookings/{id}/postbooking', [BookingController::class, 'postBooking'])->name('bookings.postbooking');
    Route::get('/addbooking', function () {
        return view('Manager.NewAddBooking');
    });
});

// Inventory Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    // Supplier and Item Management
    Route::get('/inventory/available-suppliers', [InventoryController::class, 'availableSuppliers'])->name('inventory.available-suppliers');
    Route::post('/inventory/create-supplier', [InventoryController::class, 'createSupplier'])->name('inventory.create-supplier');
    Route::get('/inventory/available-items', [InventoryController::class, 'availableItems'])->name('inventory.available-items');
    Route::post('/inventory/create-item', [InventoryController::class, 'createItem'])->name('inventory.create-item');
    Route::post('/inventory/add-to-existing', [InventoryController::class, 'addToExisting'])->name('inventory.add-to-existing');
    Route::post('/inventory/check-duplicate', [InventoryController::class, 'checkDuplicate'])->name('inventory.checkDuplicate');

    // Main Inventory CRUD
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

    Route::get('/inventory/filter', [InventoryController::class, 'filter_table'])->name('inventory.filter');

    // GRN (Goods Received Note) Management
    Route::get('/inventory/grn', [InventoryController::class, 'grn'])->name('inventory.grn');
    Route::get('inventory/{id}/batches', [InventoryController::class, 'batches'])->name('inventory.batches');

    Route::get('inventory/{id}/grn/{grn_id}', [InventoryController::class, 'editGrn'])->name('inventory.edit-grn');
    Route::put('inventory/{id}/grn/{grn_id}', [InventoryController::class, 'updateGrn'])->name('inventory.update-grn');
    Route::post('inventory/grn/{grn_id}/payment', [InventoryController::class, 'updateGrnPayment'])->name('inventory.update-grn-payment');
    Route::get('inventory/grn/{grn_id}/payment-history', [InventoryController::class, 'getGrnPaymentHistory'])->name('inventory.grn-payment-history');

    // Item Issuing Management
    Route::get('/inventory/issue', [InventoryController::class, 'issue'])->name('inventory.issue');
    Route::get('/inventory/issued-items', [InventoryController::class, 'issuedItems'])->name('inventory.issued-items');
    Route::post('/inventory/store-issued-items', [InventoryController::class, 'storeIssuedItems'])->name('inventory.store-issued-items');
    Route::post('/inventory/return-items', [InventoryController::class, 'returnItems'])->name('inventory.returnItems');

    // Vehicle and Employee Related
    Route::get('/inventory/available-vehicles', [InventoryController::class, 'availableVehicles'])->name('inventory.available-vehicles');
    Route::get('/inventory/available-employees', [InventoryController::class, 'availableEmployees'])->name('inventory.available-employees');
    Route::post('/inventory/verify-vehicle', [InventoryController::class, 'verifyVehicle'])->name('inventory.verifyVehicle');
    Route::post('/inventory/verify-employee', [InventoryController::class, 'verifyEmployee'])->name('inventory.verifyEmployee');
    Route::get('/inventory/vehicle-issued-items/{vehicleId}', [InventoryController::class, 'vehicleIssuedItems'])->name('inventory.vehicleIssuedItems');
    Route::get('/inventory/employee-issued-items/{employeeId}', [InventoryController::class, 'employeeIssuedItems'])->name('inventory.employeeIssuedItems');

    // Statistics and Reporting
    Route::get('/inventory/stats', [InventoryController::class, 'getStats'])->name('inventory.getStats');
    Route::get('/inventory/low-stock', [InventoryController::class, 'getLowStockItems'])->name('inventory.getLowStockItems');
});

// Employee Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('Employee.show');
    Route::get('/autocomplete-employees', [EmployeeController::class, 'autocomplete']);
    Route::get('/employees/search', [EmployeeController::class, 'searche'])->name('employees.search');
});

// Leave Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{id}', [LeaveController::class, 'show'])->name('leaves.show');
    Route::get('/leaves/{id}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
    Route::put('/leaves/{id}', [LeaveController::class, 'update'])->name('leaves.update');
    Route::delete('/leaves/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
    Route::patch('/leaves/{id}/status/{status}', [LeaveController::class, 'updateStatus'])->name('leaves.updateStatus');
    Route::get('/approved', [LeaveController::class, 'showApprovedLeaves'])->name('leaves.approved');
    Route::get('/rejected', [LeaveController::class, 'showRejectededLeaves'])->name('leaves.rejected');
});

// Payroll Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/payrolls', [PayrollController::class, 'index'])->name('payrolls.index');
    Route::get('/payrolls/create', [PayrollController::class, 'create'])->name('payrolls.create');
    Route::post('/payrolls', [PayrollController::class, 'store'])->name('payrolls.store');
    Route::get('/payrolls/{id}', [PayrollController::class, 'show'])->name('payrolls.show');
    Route::get('/payrolls/{id}/edit', [PayrollController::class, 'edit'])->name('payrolls.edit');
    Route::put('/payrolls/{id}', [PayrollController::class, 'update'])->name('payrolls.update');
    Route::delete('/payrolls/{id}', [PayrollController::class, 'destroy'])->name('payrolls.destroy');
});

// Attendances Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::post('/attendance/store/{id}/{type}', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
    Route::put('/attendances/{id}', [AttendanceController::class, 'update'])->name('attendances.update');
    Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
});

// CRMs Control CRUD Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/crms/create', [CrmController::class, 'create'])->name('crms.create');
    Route::post('/crms', [CrmController::class, 'store'])->name('crms.store');
    Route::get('/crms/{crm}', [CrmController::class, 'show'])->name('crms.show');
    Route::get('/crms/{crm}/edit', [CrmController::class, 'edit'])->name('crms.edit');
    Route::put('/crms/{crm}', [CrmController::class, 'update'])->name('crms.update');
    Route::delete('/crms/{crm}', [CrmController::class, 'destroy'])->name('crms.destroy');
    Route::get('/crms', [CrmController::class, 'upcomingSchedule'])->name('crms.upcoming');
});

// PostBooking Control Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/postbookings', [PostBookingController::class, 'index'])->name('postbookings.index');
    Route::get('/postbookings/create', [PostBookingController::class, 'create'])->name('postbookings.create');
    Route::post('/postbookings', [PostBookingController::class, 'store'])->name('postbookings.store');
    Route::get('/postbookings/{postBooking}', [PostBookingController::class, 'show'])->name('postbookings.show');
    Route::get('/postbookings/{postBooking}/edit', [PostBookingController::class, 'edit'])->name('postbookings.edit');
    Route::put('/postbookings/{postBooking}', [PostBookingController::class, 'update'])->name('postbookings.update');
    Route::delete('/postbookings/{postBooking}', [PostBookingController::class, 'destroy'])->name('postbookings.destroy');
    Route::get('/newpost', function () {
        return view('Manager.NewPostBooking');
    });
});

// Vehicle Owner Control Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/vehicle_owners', [VehicleOwnerController::class, 'index'])->name('vehicle_owners.index');
    Route::get('/vehicle_owners/create', [VehicleOwnerController::class, 'create'])->name('vehicle_owners.create');
    Route::post('/vehicle_owners', [VehicleOwnerController::class, 'store'])->name('vehicle_owners.store');
    Route::get('/vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'show'])->name('vehicle_owners.show');
    Route::get('/vehicle_owners/{vehicleOwner}/edit', [VehicleOwnerController::class, 'edit'])->name('vehicle_owners.edit');
    Route::put('/vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'update'])->name('vehicle_owners.update');
    Route::delete('/vehicle_owners/{vehicleOwner}', [VehicleOwnerController::class, 'destroy'])->name('vehicle_owners.destroy');
});

// Owner Payment Control Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/ownerpayments', [OwnerpaymentController::class, 'index'])->name('ownerpayments.index');
    Route::get('/ownerpayments/create', [OwnerpaymentController::class, 'create'])->name('ownerpayments.create');
    Route::post('/ownerpayments', [OwnerpaymentController::class, 'store'])->name('ownerpayments.store');
    Route::get('/ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'show'])->name('ownerpayments.show');
    Route::get('/ownerpayments/{ownerpayment}/edit', [OwnerpaymentController::class, 'edit'])->name('ownerpayments.edit');
    Route::put('/ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'update'])->name('ownerpayments.update');
    Route::delete('/ownerpayments/{ownerpayment}', [OwnerpaymentController::class, 'destroy'])->name('ownerpayments.destroy');
});

// Service Control Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::get('/services/{service}/download-excel', [ServiceController::class, 'downloadExcel'])->name('services.download-excel');
});

// Expenses Control Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    Route::get('/expenses/download/{id}', [ExpenseController::class, 'download'])->name('expenses.download');
});

// Business Control Routes
Route::middleware(['admin'])->group(function () {
    Route::get('/addbus', [BusinessController::class, 'create'])->name('addbus');
    Route::post('/addbus', [BusinessController::class, 'store'])->name('storebus');
    Route::get('/bus/{id}', [BusinessController::class, 'show'])->name('buss.show');
    Route::get('/bus/{id}/edit', [BusinessController::class, 'edit'])->name('bus.edit');
    Route::put('/bus/{id}', [BusinessController::class, 'update'])->name('bus.update');
    Route::delete('/bus/{id}', [BusinessController::class, 'destroy'])->name('bus.destroy');
    Route::get('/superadmin', [HomeController::class, 'index'])->name('business.index');
    Route::get('/superadmin', [HomeController::class, 'search'])->name('bus.search');
});

// User Control Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user/create', [App\Http\Controllers\UserManagementController::class, 'create'])->name('user.create');
    Route::get('/users', [App\Http\Controllers\UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user/store', [App\Http\Controllers\UserManagementController::class, 'store'])->name('user.store');
    Route::get('/search/users', [App\Http\Controllers\UserManagementController::class, 'search'])->name('user.search');
    Route::delete('/users/{id}', [App\Http\Controllers\UserManagementController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/update-password', [App\Http\Controllers\UserManagementController::class, 'updatePassword'])->name('user.updatePassword');
});

// Home Routes and Other Routes
Route::middleware(['manager'])->group(function () {
    Route::get('/manager/dashboard', [DashboardController::class, 'calendarView'])->name('manager.dashboard');
    Route::get('/manager/bookings', [DashboardController::class, 'getBookingsByDate']);
    Route::get('/profit-loss-report', [ProfitLossController::class, 'index'])->name('profit.loss');
    Route::post('/salary/store', [SalaryController::class, 'store'])->name('salary.store');
    Route::get('/manager/addbook', [HomeController::class, 'manageraddbook'])->name('manager.addbook');
    Route::get('/hr-management', function () {
        return view('Manager.HRManagment');
    })->name('hrmanagement');
    Route::get('/detailedvehicle', function () {
        return view('Manager.NewDetailedVehicle');
    });
});

Route::get('/please-login', function () {
    return view('please-login');
});

Route::get('/profit-data', [PostBookingController::class, 'getProfitData']);
Route::get('/vehicle-availability', [VehicleController::class, 'vehicleAvailability']);

// Utility route for linking storage
Route::get('/link', function () {
    $source = storage_path('app/public');
    $destination = public_path('storage');

    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    function copyDirectory($source, $destination)
    {
        $directory = opendir($source);

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        while (($file = readdir($directory)) !== false) {
            if ($file !== '.' && $file !== '..') {
                $srcFile = $source . DIRECTORY_SEPARATOR . $file;
                $destFile = $destination . DIRECTORY_SEPARATOR . $file;

                if (is_dir($srcFile)) {
                    copyDirectory($srcFile, $destFile);
                } else {
                    copy($srcFile, $destFile);
                }
            }
        }

        closedir($directory);
    }

    copyDirectory($source, $destination);

    return 'Files and directories copied to public/storage successfully.';
});

Route::delete('/vehicles/{id}/image', [VehicleController::class, 'deleteImage'])
    ->name('vehicles.deleteImage');

Route::patch('/vehicles/{vehicle}/service-status', [VehicleController::class, 'updateServiceStatus'])
    ->name('vehicles.serviceStatus')
    ->middleware(['manager']);
