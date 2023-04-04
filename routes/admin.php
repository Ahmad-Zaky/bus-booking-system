<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\AuthController;
use App\Http\Controllers\Api\V1\Admin\BusController;
use App\Http\Controllers\Api\V1\Admin\ReservationController;
use App\Http\Controllers\Api\V1\Admin\TripController;

Route::post('login', [AuthController::class, 'login'])->name("admin.login");

Route::middleware('auth:admin')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name("admin.register");

    Route::get('profile', [AuthController::class, 'profile'])->name("admin.profile");
    
    Route::post('logout', [AuthController::class, 'logout'])->name("admin.logout");

    Route::apiResource("buses", BusController::class);
   
    Route::apiResource("trips", TripController::class);

    Route::apiResource("reservations", ReservationController::class);
});
