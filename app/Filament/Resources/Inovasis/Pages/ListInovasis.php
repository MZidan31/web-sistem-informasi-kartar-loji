<?php

namespace App\Filament\Resources\Inovasis\Pages; // Pastikan ini Inovasis

use App\Filament\Resources\Inovasis\InovasiResource; // Pastikan ini Inovasis
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInovasis extends ListRecords
{
    protected static string $resource = InovasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->label('New Inovasi')
                ->hidden(fn() => auth()->user()->role === 'admin'), // PAKSA SEMBUNYI!
        ];
    }
}
