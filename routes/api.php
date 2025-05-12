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



Route::post('/login', [ApiAuthController::class, 'login']);

//Auth Routes
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
    Route::get('/vehicles', [VehicleApiController::class, 'index']);
    Route::get('/vehicles/{id}', [VehicleApiController::class, 'show']);
    Route::post('/vehicles', [VehicleApiController::class, 'store']);
    Route::put('/vehicles/{id}', [VehicleApiController::class, 'update']);
    Route::delete('/vehicles/{id}', [VehicleApiController::class, 'delete']);
});

//Leave Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/leaves', [LeaveApiController::class, 'index']);
    Route::post('/leaves', [LeaveApiController::class, 'store']);
    Route::post('/leaves/{id}/status', [LeaveApiController::class, 'updateStatus']);
    Route::get('/leaves/approved', [LeaveApiController::class, 'showApproved']);
    Route::get('/leaves/rejected', [LeaveApiController::class, 'showRejected']);
});

//Booking Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookings', [BookingApiController::class, 'index']);
    Route::post('/bookings', [BookingApiController::class, 'store']);
    Route::get('/bookings/{id}', [BookingApiController::class, 'show']);
    Route::get('/bookings/{id}/post', [BookingApiController::class, 'postBooking']);
    Route::put('/bookings/{id}', [BookingApiController::class, 'update']);
    Route::delete('/bookings/{id}', [BookingApiController::class, 'destroy']);
});

//PostBookings Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('postbookings', [PostBookingApiController::class, 'index']); // List all post bookings
    Route::post('postbookings', [PostBookingApiController::class, 'store']); // Create a new post booking
    Route::get('postbookings/{postBooking}', [PostBookingApiController::class, 'show']); // View a specific post booking
    Route::put('/postbookings/{id}', [PostBookingApiController::class, 'update']);
    Route::delete('/postbookings/{id}', [PostBookingApiController::class, 'destroy']);
});


//Dashboard Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('calendar/summary', [DashboardApiController::class, 'apiCalendarSummary']); // API summary for calendar
    Route::get('calendar/bookings', [DashboardApiController::class, 'apiGetBookingsByDate']); // Bookings & availability for a day
});

//Profit Loss Routes
Route::middleware('auth:sanctum')->get('/reports/pl', [ProfitLossApiController::class, 'plReport']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/vehicleowners', [VehicleOwnerApiController::class, 'index']);
    Route::post('/vehicleowners', [VehicleOwnerApiController::class, 'store']);
    Route::put('/vehicleowners/{id}', [VehicleOwnerApiController::class, 'update']);
    Route::delete('/vehicleowners/{id}', [VehicleOwnerApiController::class, 'destroy']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/ownerpayments', [OwnerpaymentApiController::class, 'index']);
    Route::post('/ownerpayments', [OwnerpaymentApiController::class, 'store']);
    Route::put('/ownerpayments/{id}', [OwnerpaymentApiController::class, 'update']);
    Route::delete('/ownerpayments/{id}', [OwnerpaymentApiController::class, 'destroy']);
});
