<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\VehicleApiController;
use App\Http\Controllers\Api\LeaveApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\PostBookingApiController;
use App\Http\Controllers\Api\DashboardApiController;
use App\Http\Controllers\Api\ProfitLossApiController;
use App\Http\Controllers\Api\VehicleOwnerApiController;
use App\Http\Controllers\Api\OwnerpaymentApiController;
use App\Http\Controllers\Api\CustomerApiController;


//Auth Routes
Route::post('/login', [ApiAuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

//Test Route
Route::get('/test', function () {
    return response()->json(['message' => 'API routes are working']);
});

//vehicle Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/vehicles', [VehicleApiController::class, 'index']);// List all Vehicles
    Route::get('/vehicles/{id}', [VehicleApiController::class, 'show']);//Get details of one vehicle
    Route::post('/vehicles', [VehicleApiController::class, 'store']);//Add Vehicle
    Route::put('/vehicles/{id}', [VehicleApiController::class, 'update']);//Edit Vehicle
    Route::delete('/vehicles/{id}', [VehicleApiController::class, 'delete']);//Delete Vehicle
});

//Leave Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/leaves', [LeaveApiController::class, 'index']);// List all Leaves
    Route::post('/leaves', [LeaveApiController::class, 'store']);//Create Leaves
    Route::post('/leaves/{id}/status', [LeaveApiController::class, 'updateStatus']);//Update leave status
    Route::get('/leaves/approved', [LeaveApiController::class, 'showApproved']);//List all approved leaves
    Route::get('/leaves/rejected', [LeaveApiController::class, 'showRejected']);//List all rejected leaves
});

//Booking Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookings', [BookingApiController::class, 'index']);//// List all bookings
    Route::post('/bookings', [BookingApiController::class, 'store']);//Create booking
    Route::get('/bookings/{id}', [BookingApiController::class, 'show']);//Get details about one booking
    Route::get('/bookings/{id}/post', [BookingApiController::class, 'postBooking']);//Direct to postbooking
    Route::put('/bookings/{id}', [BookingApiController::class, 'update']);//Edit booking
    Route::delete('/bookings/{id}', [BookingApiController::class, 'destroy']);//Delete booking
});

//PostBookings Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('postbookings', [PostBookingApiController::class, 'index']); // List all post bookings
    Route::post('postbookings', [PostBookingApiController::class, 'store']); // Create a new post booking
    Route::get('postbookings/{postBooking}', [PostBookingApiController::class, 'show']); // View a specific post booking
    Route::put('/postbookings/{id}', [PostBookingApiController::class, 'update']);//Edit Post booking
    Route::delete('/postbookings/{id}', [PostBookingApiController::class, 'destroy']);//Delete postbooking
});


//Dashboard Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('calendar/summary', [DashboardApiController::class, 'apiCalendarSummary']); // API summary for calendar
    Route::get('calendar/bookings', [DashboardApiController::class, 'apiGetBookingsByDate']); // Bookings & availability for a day
});

//Profit Loss Routes
Route::middleware('auth:sanctum')->get('/reports/pl', [ProfitLossApiController::class, 'plReport']);
Route::middleware('auth:sanctum')->post('/custom-pl-report', [ProfitLossApiController::class, 'plReportByCustomDates']);
Route::middleware('auth:sanctum')->get('/pl-report/{startDate}/{endDate}', [ProfitLossApiController::class, 'plReportmanual']);




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/vehicleowners', [VehicleOwnerApiController::class, 'index']);// List all vehicle owners
    Route::post('/vehicleowners', [VehicleOwnerApiController::class, 'store']);//Add Vehicle owner
    Route::put('/vehicleowners/{id}', [VehicleOwnerApiController::class, 'update']);//Edit vehicle owner
    Route::delete('/vehicleowners/{id}', [VehicleOwnerApiController::class, 'destroy']);//Delete vehicle owner
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ownerpayments', [OwnerpaymentApiController::class, 'index']);// List all vehicle owner
    Route::post('/ownerpayments', [OwnerpaymentApiController::class, 'store']);//Add owner payment
    Route::put('/ownerpayments/{id}', [OwnerpaymentApiController::class, 'update']);// Edit owner payment
    Route::delete('/ownerpayments/{id}', [OwnerpaymentApiController::class, 'destroy']);//delete owner payment
});




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/customers', [CustomerApiController::class, 'index']);// List all customers 
    Route::post('/customers', [CustomerApiController::class, 'store']);//create customer
    Route::get('/customers/{id}', [CustomerApiController::class, 'show']);//Details about one customer
    Route::put('/customers/{id}', [CustomerApiController::class, 'update']);//Edit customers
    Route::delete('/customers/{id}', [CustomerApiController::class, 'destroy']);//Delete customers
    Route::get('/customers/search', [CustomerApiController::class, 'search']);//Search customers
    Route::get('/customers/{id}/details', [CustomerApiController::class, 'getCustomerDetails']);//Get details about customer for booking page
});
