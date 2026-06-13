<?php

namespace App\Http\Controllers;

use App\Models\Inovasi;
use App\Models\Kegiatan;

class InovasiController extends Controller
{
    public function landingPage()
    {
        // 1. MURNI DATA LOKAL. API DIPUTUS TOTAL.
        $inovasis = Inovasi::with(['user', 'fotoInovasis'])
            ->where('status', 'disetujui')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $kegiatans = Kegiatan::with(['user', 'fotoKegiatans'])
            ->where('status', 'disetujui')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // 2. Lempar data murni lokal ke View
        return view('welcome', compact('inovasis', 'kegiatans'));
    }
}
