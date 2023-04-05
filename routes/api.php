<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ReservationController;
use App\Http\Controllers\Api\V1\TripController;

Route::post('register', [AuthController::class, 'register'])->name("register");
Route::post('login', [AuthController::class, 'login'])->name("login");

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [AuthController::class, 'profile'])->name("profile");

    Route::post('logout', [AuthController::class, 'logout'])->name("logout");
       
    Route::apiResource("trips", TripController::class);

    Route::apiResource("reservations", ReservationController::class);
});
