<?php

use App\Models\Inovasi;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;

// Biar temen lo bisa narik Inovasi lo
Route::get('/inovasi-loji', function () {
    return response()->json([
        'status' => 'success',
        'data' => Inovasi::where('status', 'disetujui')->get()
    ]);
});

// Biar temen lo bisa narik Kegiatan lo
Route::get('/kegiatan-loji', function () {
    return response()->json([
        'status' => 'success',
        'data' => Kegiatan::where('status', 'disetujui')->get()
    ]);
});
