<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WilayahController;
use App\Http\Controllers\API\WilayahLevel12Controller;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Maps API!']);
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::middleware(['api_key'])->group(function () {
    Route::prefix('wilayah')->controller(WilayahController::class)->group(function () {
        Route::get('provinsi', 'provinsi');
        Route::get('kabupaten/{kodeProvinsi}', 'kabupaten');
        Route::get('kecamatan/{kodeKabupaten}', 'kecamatan');
        Route::get('kelurahan/{kodeKecamatan}', 'kelurahan');
    });
    Route::get('wilayah/terdekat', [WilayahLevel12Controller::class, 'nearest']);
});
