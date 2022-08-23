<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrentController;
use App\Http\Controllers\EnergyController;
use App\Http\Controllers\PlateTempController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\RadController;
use App\Http\Controllers\RoomTempController;
use App\Http\Controllers\VoltageController;
use App\Http\Controllers\Controller;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/current', [CurrentController::class, 'save']);
Route::get('/energy', [EnergyController::class, 'save']);
Route::get('/plate-temp', [PlateTempController::class, 'save']);
Route::get('/room-temp', [RoomTempController::class, 'save']);
Route::get('/power', [PowerController::class, 'save']);
Route::get('/rad', [RadController::class, 'save']);
Route::get('/voltage', [VoltageController::class, 'save']);
Route::get('/clear-db', [Controller::class, 'clearDb']);
