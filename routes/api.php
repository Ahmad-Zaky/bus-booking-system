<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

Route::post('register', [AuthController::class, 'register'])->name("register");
Route::post('login', [AuthController::class, 'login'])->name("login");

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', function (Request $request) {
        return $request->user();
    })->name("profile");

    Route::post('logout', [AuthController::class, 'logout'])->name("logout");
});
