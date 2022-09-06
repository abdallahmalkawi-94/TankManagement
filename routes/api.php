<?php

use App\Http\Controllers\SystemDeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/create_new_system' , [SystemDeviceController::class , 'store'])->name('store');
Route::post('/update_device_value' , [SystemDeviceController::class , 'update'])->name('update');
