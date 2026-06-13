<?php

namespace App\Filament\Resources\Kegiatans\Pages;

use App\Filament\Resources\Kegiatans\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // INI LONCENG BUAT KEGIATAN BARU
    protected function afterCreate(): void
    {
        $record = $this->record;
        $currentUser = auth()->user();

        $ketum = \App\Models\User::where('role', 'admin')->first();

        if ($ketum) {
            \Filament\Notifications\Notification::make()
                ->title('Kegiatan Baru Masuk!')
                ->body("Divisi {$currentUser->name} mengajukan kegiatan: '{$record->judul}'.")
                ->color('info')
                ->sendToDatabase($ketum);
        }
    }
}
