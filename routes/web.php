<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\designController;
use App\Http\Controllers\RSMController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\URoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BeatController;
use App\Http\Controllers\CustomeridController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('regions', RegionController::class);
    Route::get('/designation/overveiw', [designController::class, 'overview'])->name('design.overview');
    Route::resource('rsms', RSMController::class);
    Route::resource('u_roles', URoleController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('beats', BeatController::class);
    Route::resource('customer-creation', CustomeridController::class);
});
Route::get('/api/states', [RegionController::class, 'fetchStates']);
Route::get('/api/districts/{stateCode}', [RegionController::class, 'fetchDistricts']);
Route::get('/region-states', [StateController::class, 'getStatesByRegion']);
Route::patch('/employees/{employee}/toggle-status', [EmployeeController::class, 'toggleStatus'])->name('employees.toggleStatus');
Route::get('/get-states/{zoneId}', [BeatController::class, 'getStates']);
Route::get('/get-districts/{stateName}', [BeatController::class, 'getDistricts']);
Route::get('/get-areas/{districtName}', [BeatController::class, 'getAreas']);
// In your web.php (routes file)
Route::get('/get-beats-by-area/{areaId}', [EmployeeController::class, 'getBeatsByArea']);
Route::get('/api/states/{region}', [RegionController::class, 'fetchStatesByRegion']);
Route::get('/api/districts/{state}', [RegionController::class, 'fetchDistrictsByState']);
Route::get('/get-employees/{locationType}/{locationId}', [EmployeeController::class, 'getEmployeesByLocation']);






Route::get('/', function () {
    return view('welcome');
});
