<?php

namespace App\Filament\Widgets;

use App\Models\Kegiatan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestActivities extends BaseWidget
{
    protected static ?string $heading = 'Aktivitas Kegiatan Terbaru';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(Kegiatan::query()->latest()->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Nama Kegiatan'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pengusul'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match (strtolower($state)) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        default => 'secondary',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
