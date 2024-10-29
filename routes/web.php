<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\designController;
use App\Http\Controllers\EmployeeController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('regions', RegionController::class);
    Route::get('/designation/overveiw', [designController::class, 'overview'])->name('design.overview');
    Route::resource('employees', EmployeeController::class);
});
Route::get('/api/states', [RegionController::class, 'fetchStates']);
Route::get('/api/districts/{stateCode}', [RegionController::class, 'fetchDistricts']);



Route::get('/', function () {
    return view('welcome');
});
