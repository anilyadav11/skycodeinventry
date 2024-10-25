<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegionController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('regions', RegionController::class);
});
Route::get('/api/states', [RegionController::class, 'fetchStates']);
Route::get('/api/districts/{stateCode}', [RegionController::class, 'fetchDistricts']);

Route::get('/', function () {
    return view('welcome');
});
