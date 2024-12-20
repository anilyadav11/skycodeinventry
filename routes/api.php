<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BeatController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AttendanceController;
use App\Http\Controllers\api\OutletController;
use App\Http\Controllers\api\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::get('/beats', [BeatController::class, 'index']);
Route::post('/beats', [BeatController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'storeAttendance']);
Route::get('/attendance', [AttendanceController::class, 'index']);
Route::get('/outlates', [OutletController::class, 'index']);
Route::post('/outlates', [OutletController::class, 'store']);
