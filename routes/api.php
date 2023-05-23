<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;

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


Route::get('kendaraan', [KendaraanController::class, 'index']);
Route::get('kendaraan/{id}', [KendaraanController::class, 'show']);
Route::post('kendaraan', [KendaraanController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/kendaraans', [KendaraanController::class, 'index']);
Route::post('/kendaraans', [KendaraanController::class, 'store']);
Route::get('/kendaraans/{id}', [KendaraanController::class, 'show']);
Route::put('/kendaraans/{id}', [KendaraanController::class, 'update']);
Route::delete('/kendaraans/{id}', [KendaraanController::class, 'destroy']);
Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::post('/kendaraan', [KendaraanController::class, 'store']);
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show']);
Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy']);

Route::get('kendaraan/stok', [KendaraanController::class, 'getStokKendaraan']);
Route::delete('kendaraan/{id}', [KendaraanController::class, 'penjualanKendaraan']);
Route::get('kendaraan/laporan', [KendaraanController::class, 'laporanPenjualan']);
