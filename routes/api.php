<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\VehicleApiController;
use App\Http\Controllers\Api\LeaveApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\PostBookingApiController;
use App\Http\Controllers\Api\DashboardApiController;
use App\Http\Controllers\Api\ProfitLossApiController;









Route::post('/login', [ApiAuthController::class, 'login']);

// Protected routes (require token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

// routes/api.php
Route::get('/test', function () {
    return response()->json(['message' => 'API routes are working']);
});




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/vehicles', [VehicleApiController::class, 'index']);
    Route::get('/vehicles/{id}', [VehicleApiController::class, 'show']);
    Route::post('/vehicles', [VehicleApiController::class, 'store']);
});




Route::middleware('auth:sanctum')->group(function () {
    Route::get('/leaves', [LeaveApiController::class, 'index']);
    Route::post('/leaves', [LeaveApiController::class, 'store']);
    Route::post('/leaves/{id}/status', [LeaveApiController::class, 'updateStatus']);
    Route::get('/leaves/approved', [LeaveApiController::class, 'showApproved']);
    Route::get('/leaves/rejected', [LeaveApiController::class, 'showRejected']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/bookings', [BookingApiController::class, 'index']);
    Route::post('/bookings', [BookingApiController::class, 'store']);
    Route::get('/bookings/{id}', [BookingApiController::class, 'show']);
    Route::get('/bookings/{id}/post', [BookingApiController::class, 'postBooking']);
});


use App\Http\Controllers\PostBookingController;

Route::middleware('auth:sanctum')->group(function () {
    // API routes for PostBookings
    Route::get('postbookings', [PostBookingApiController::class, 'index']); // List all post bookings
    Route::post('postbookings', [PostBookingApiController::class, 'store']); // Create a new post booking
    Route::get('postbookings/{postBooking}', [PostBookingApiController::class, 'show']); // View a specific post booking
});




Route::middleware('auth:sanctum')->group(function () {
    Route::get('calendar/summary', [DashboardApiController::class, 'apiCalendarSummary']); // API summary for calendar
    Route::get('calendar/bookings', [DashboardApiController::class, 'apiGetBookingsByDate']); // Bookings & availability for a day
});

Route::middleware('auth:sanctum')->get('/reports/pl', [ProfitLossApiController::class, 'plReport']);
