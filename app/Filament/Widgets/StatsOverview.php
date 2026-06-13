<?php

namespace App\Filament\Widgets;

use App\Models\Inovasi;
use App\Models\Kegiatan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $user = auth()->user();
        $isKetum = $user->role === 'admin';

        // Scoping data sesuai Role (Prinsip UML Access Control)
        $queryInovasi = $isKetum ? Inovasi::query() : Inovasi::where('user_id', $user->id);
        $queryKegiatan = $isKetum ? Kegiatan::query() : Kegiatan::where('user_id', $user->id);

        return [
            Stat::make('Pengajuan Pending', (clone $queryInovasi)->where('status', 'pending')->count() + (clone $queryKegiatan)->where('status', 'pending')->count())
                ->description('Butuh Validasi Segera')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->chart([3, 5, 2, 8, 4, 7, 2]),

            Stat::make('Inovasi Disetujui', (clone $queryInovasi)->where('status', 'disetujui')->count())
                ->description('Total Karya Tersalurkan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([1, 3, 5, 10, 15, 18, 20]),

            Stat::make('Kegiatan Disetujui', (clone $queryKegiatan)->where('status', 'disetujui')->count())
                ->description('Total Realisasi Program')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('primary')
                ->chart([4, 2, 7, 5, 12, 10, 15]),
        ];
    }
}
