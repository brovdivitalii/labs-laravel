<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/gas-stations', [GasStationController::class, 'index']);
Route::get('/gas-stations/create', [GasStationController::class, 'create']);
Route::post('/gas-stations', [GasStationController::class, 'store']);
Route::get('/gas-stations/{id}', [GasStationController::class, 'show']);
Route::get('/gas-stations/{id}/edit', [GasStationController::class, 'edit']);
Route::put('/gas-stations/{id}', [GasStationController::class, 'update']);
Route::delete('/gas-stations/{id}', [GasStationController::class, 'destroy']);
Route::put('/gas-stations/{id}', 'GasStationController@update')->name('GasStation.update');
