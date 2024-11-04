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

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('regions', RegionController::class);
    Route::get('/designation/overveiw', [designController::class, 'overview'])->name('design.overview');
    Route::resource('rsms', RSMController::class);
    Route::resource('roles', URoleController::class);
    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
    Route::resource('customers', CustomerController::class);
});
Route::get('/api/states', [RegionController::class, 'fetchStates']);
Route::get('/api/districts/{stateCode}', [RegionController::class, 'fetchDistricts']);
Route::get('/region-states', [StateController::class, 'getStatesByRegion']);
Route::get('/regions/{region}', function ($region) {
    // Fetch the state, district, and area based on the selected region
    $data = [
        'state' => 'State for ' . $region, // Replace with actual logic to get state
        'district' => 'District for ' . $region, // Replace with actual logic to get district
        'area' => 'Area for ' . $region // Replace with actual logic to get area
    ];

    return response()->json($data);
});



Route::get('/', function () {
    return view('welcome');
});
