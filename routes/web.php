<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/action-chart', [GraphController::class, 'atualizer'])->name('atualizer');
Route::get('/action-measure', [GraphController::class, 'measure'])->name('measure');
Route::get('/index', [GraphController::class, 'index']);