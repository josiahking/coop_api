<?php

use App\Http\Controllers\Auth\DriverAuthController;
use App\Http\Controllers\Auth\RiderAuthController;
use App\Http\Controllers\DriverOnboardingController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\OtpRequestController;
use App\Http\Controllers\OtpVerifyController;
use App\Http\Controllers\RidersController;
use App\Http\Middleware\JsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware([JsonMiddleware::class])->group(function () {
// Group routes for drivers
    Route::prefix('driver')->group(function () {
        Route::post('/register', [DriverAuthController::class, 'register']);
        Route::post('/login', [DriverAuthController::class, 'login']);
    });
//drivers
    Route::prefix('drivers')->group(function () {
        Route::get('/', [DriversController::class, 'index']);
        Route::get('/new', [DriversController::class, 'newDrivers']);
        Route::get('/active', [DriversController::class, 'activeDrivers']);
        Route::get('/suspended', [DriversController::class, 'suspendedDrivers']);
    });
// Group routes for riders
    Route::prefix('rider')->group(function () {
        Route::post('/register', [RiderAuthController::class, 'register']);
        Route::post('/login', [RiderAuthController::class, 'login']);
    });
//riders
    Route::prefix('riders')->group(function () {
        Route::get('/', [RidersController::class, 'index']);
    });
//otp
    Route::prefix('otp')->group(function () {
        Route::post('/verify', [OtpVerifyController::class, 'verifyOtp']);
        Route::post('/request', [OtpRequestController::class, 'sendOtp']);
    });
});
Route::middleware([JsonMiddleware::class, 'auth:sanctum'])->group(function () {

    Route::post('/driver/onboard', [DriverOnboardingController::class, 'onboard']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
