<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Inovasi;

class InovasiChart extends ChartWidget
{
    // HAPUS KATA 'STATIC' DI SINI
    protected ?string $heading = 'Statistik Tren Program';

    // Yang ini tetep static, kaga apa-apa
    protected static ?int $sort = 2;
    
    // Bikin setengah layar biar bisa dijejerin 50:50
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $year = now()->year;
        
        $inovasiPending = Inovasi::selectRaw('MONTH(tanggal_diajukan) as month, COUNT(*) as count')
            ->where('status', 'pending')
            ->whereYear('tanggal_diajukan', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $inovasiDisetujui = Inovasi::selectRaw('MONTH(tanggal_diajukan) as month, COUNT(*) as count')
            ->where('status', 'disetujui')
            ->whereYear('tanggal_diajukan', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $kegiatanPending = \App\Models\Kegiatan::selectRaw('MONTH(tanggal_diajukan) as month, COUNT(*) as count')
            ->where('status', 'pending')
            ->whereYear('tanggal_diajukan', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $kegiatanDisetujui = \App\Models\Kegiatan::selectRaw('MONTH(tanggal_diajukan) as month, COUNT(*) as count')
            ->where('status', 'disetujui')
            ->whereYear('tanggal_diajukan', $year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $dataInovasiPending = [];
        $dataInovasiDisetujui = [];
        $dataKegiatanPending = [];
        $dataKegiatanDisetujui = [];
        
        $labels = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $months[$i - 1];
            $dataInovasiPending[] = $inovasiPending[$i] ?? 0;
            $dataInovasiDisetujui[] = $inovasiDisetujui[$i] ?? 0;
            $dataKegiatanPending[] = $kegiatanPending[$i] ?? 0;
            $dataKegiatanDisetujui[] = $kegiatanDisetujui[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Usulan Inovasi (Pending)',
                    'data' => $dataInovasiPending,
                    'backgroundColor' => '#3b82f6', // Biru
                    'borderColor' => '#3b82f6',
                    'borderWidth' => 3,
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Inovasi Terealisasi (Approve)',
                    'data' => $dataInovasiDisetujui,
                    'backgroundColor' => '#f97316', // Oren
                    'borderColor' => '#f97316',
                    'borderWidth' => 3,
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Usulan Kegiatan (Pending)',
                    'data' => $dataKegiatanPending,
                    'backgroundColor' => '#a855f7', // Ungu
                    'borderColor' => '#a855f7',
                    'borderWidth' => 3,
                    'pointStyle' => 'rectRot',
                    'pointRadius' => 5,
                    'borderDash' => [5, 5], // Garis putus-putus biar kalo datanya sama tetep keliatan yg bawah
                ],
                [
                    'label' => 'Kegiatan Terealisasi (Approve)',
                    'data' => $dataKegiatanDisetujui,
                    'backgroundColor' => '#10b981', // Hijau
                    'borderColor' => '#10b981',
                    'borderWidth' => 3,
                    'pointStyle' => 'rectRot',
                    'pointRadius' => 5,
                    'borderDash' => [5, 5],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
