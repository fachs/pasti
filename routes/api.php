<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\KodeAsetController;
use App\Http\Controllers\KodeBarangController;
use App\Models\KodeAset;
use App\Models\KodeBarang;
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

Route::get('/asets', [AsetController::class, 'getAsets']);
Route::put('/asets', [AsetController::class, 'update']);
Route::get('/kode_asets', [KodeAsetController::class, 'getKodeAsets']);
Route::get('/kode_barangs', [KodeBarangController::class, 'getKodeBarangs']);
Route::put('/kode_barangs', [KodeBarangController::class, 'update']);
Route::put('/kode_asets', [KodeAsetController::class, 'update']);
Route::delete('/kode_asets/{id}', [KodeAsetController::class, 'destroy']);
Route::delete('/asets/{id}', [AsetController::class, 'destroy']);
Route::delete('/kode_barangs/{id}', [KodeBarangController::class, 'destroy']);