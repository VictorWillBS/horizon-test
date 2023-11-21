<?php

use App\Http\Controllers\BatteryController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SurferController;
use App\Http\Controllers\WaveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/surfer')->controller(SurferController::class)->group(function () {
    Route::get('/', 'getAll')->name('surfer.getAll');
    Route::post('/', 'create')->name('surfer.create');
});

Route::prefix('/batery')->controller(BatteryController::class)->group(function () {
    Route::post('/', 'create')->name('battery.create');
});

Route::prefix('/wave')->controller(WaveController::class)->group(function () {
    Route::post('/', 'create')->name('wave.create');
});

Route::prefix('/notes')->controller(NotesController::class)->group(function () {
    Route::post('/', 'create')->name('notes.create');
});
