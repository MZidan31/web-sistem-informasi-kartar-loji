<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InovasiController; // TAMBAHKAN INI agar file ini kenal controllernya

// ==========================================
// RUTE HALAMAN UTAMA (LANDING PAGE)
// ==========================================
// Kita pindahkan logika pengambilan data ke InovasiController biar presisi!
Route::get('/', [InovasiController::class, 'landingPage']);

// ==========================================
// BYPASS MUTLAK GAMBAR UNTUK WINDOWS
// ==========================================
Route::get('/berkas-lokal/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath);
})->where('path', '.*');
