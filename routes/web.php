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
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\ProductCategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProductPricingController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\OutletTypeController;
use App\Http\Controllers\StockController;

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
    Route::resource('products-categories', ProductCategorieController::class);
    Route::resource('products', ProductController::class);
    Route::resource('outlettype', OutletTypeController::class);
    Route::resource('outlets', OutletController::class);
    Route::resource('stocks', StockController::class);

    //for employee attendance   
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/filter', [AttendanceController::class, 'filter']);
    Route::get('/states/{regionId}', [AttendanceController::class, 'getStates']);
    Route::get('/districts/{stateId}', [AttendanceController::class, 'getDistricts']);
    Route::get('/areas/{districtId}', [AttendanceController::class, 'getAreas']);
    Route::get('/attendance/create', [AttendanceController::class, 'createAttendance'])->name('attendance.create');
    Route::post('/attendance/store', [AttendanceController::class, 'storeAttendance'])->name('attendance.store');

    Route::resource('product-pricing', ProductPricingController::class);
    //end for employee attendance

    // Route::get('/get-pricing/{productId}', [BillingController::class, 'getPricingOptions']);
    // Route::get('/get-price/{productId}/{type}/{unitType}/{customerType}', [BillingController::class, 'getPrice']);
    Route::get('/get-customer-types/{productId}', [BillingController::class, 'getCustomerTypes']);
    Route::get('/get-price/{productId}/{type}/{unitType}/{customerType}', [BillingController::class, 'getPrice']);


    Route::get('billing/create', [BillingController::class, 'create'])->name('billing.create');
    Route::post('billing/store', [BillingController::class, 'store'])->name('billing.store');
});
Route::get('/api/states', [RegionController::class, 'fetchStates']);
Route::get('/api/districts/{stateCode}', [RegionController::class, 'fetchDistricts']);
Route::get('/region-states', [StateController::class, 'getStatesByRegion']);
Route::patch('/employees/{employee}/toggle-status', [EmployeeController::class, 'toggleStatus'])->name('employees.toggleStatus');
Route::patch('/customers/{customer}/toggle-status', [CustomeridController::class, 'toggleStatus'])->name('customers.toggleStatus');

Route::get('/get-states/{zoneId}', [BeatController::class, 'getStates']);
Route::get('/get-districts/{stateName}', [BeatController::class, 'getDistricts']);
Route::get('/get-areas/{districtName}', [BeatController::class, 'getAreas']);
// In your web.php (routes file)
Route::get('/get-beats-by-area/{areaId}', [EmployeeController::class, 'getBeatsByArea']);
Route::get('/api/states/{region}', [RegionController::class, 'fetchStatesByRegion']);
Route::get('/api/districts/{state}', [RegionController::class, 'fetchDistrictsByState']);
Route::get('/get-employees/{locationType}/{locationId}', [EmployeeController::class, 'getEmployeesByLocation']);

Route::post('api/fetch-customers', [BeatController::class, 'costumerdropdown']);

Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);

Route::post('api/fetch-distic', [DropdownController::class, 'fetchDistic']);
Route::post('api/fetch-area', [DropdownController::class, 'fetchArea']);

Route::get('/', function () {
    return view('welcome');
});
