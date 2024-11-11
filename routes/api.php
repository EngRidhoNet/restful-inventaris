<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('barang', BarangController::class);
Route::apiResource('kategori', KategoriController::class);
Route::apiResource('peminjaman', PeminjamanController::class);
Route::apiResource('karyawan', KaryawanController::class);
