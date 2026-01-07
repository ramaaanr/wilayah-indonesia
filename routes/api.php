<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WilayahController;
use App\Http\Controllers\API\WilayahLevel12Controller;

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

Route::middleware(['api.key'])->group(function () {
    Route::prefix('wilayah')->controller(WilayahController::class)->group(function () {
        Route::get('provinsi', 'provinsi');
        Route::get('kabupaten/{kodeProvinsi}', 'kabupaten');
        Route::get('kecamatan/{kodeKabupaten}', 'kecamatan');
        Route::get('kelurahan/{kodeKecamatan}', 'kelurahan');
    });
    Route::get('wilayah/terdekat', [WilayahLevel12Controller::class, 'nearest']);
});
