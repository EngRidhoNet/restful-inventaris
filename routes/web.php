<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BarangController;
// use App\Http\Controllers\KategoriController;
// use App\Http\Controllers\PeminjamanController;
// use App\Http\Controllers\KaryawanController;



Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('api')->middleware('api')->group(function () {
//     Route::apiResource('barang', BarangController::class);
//     Route::apiResource('kategori', KategoriController::class);
//     Route::apiResource('peminjaman', PeminjamanController::class);
//     Route::apiResource('karyawan', KaryawanController::class);
// });
