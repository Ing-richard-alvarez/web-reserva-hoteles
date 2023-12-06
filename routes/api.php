<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('hotels', HotelController::class);
Route::apiResource('bookings', BookingController::class);
Route::put('bookings/updatestatus/{booking}',[BookingController::class, 'updateStatus'])->name('bookings.update_status');
Route::get('/bookings/filters/{search?}/{fecha?}',[BookingController::class, 'filtersBooking'])->name('bookings.filter_booking');