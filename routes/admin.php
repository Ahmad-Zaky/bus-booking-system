<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\AuthController;

Route::post('login', [AuthController::class, 'login'])->name("admin.login");

Route::middleware('auth:admin')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name("admin.register");

    Route::get('user', function (Request $request) {
        return $request->user();
    })->name("admin.profile");
    
    Route::post('logout', [AuthController::class, 'logout'])->name("admin.logout");
});
