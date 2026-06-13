<?php

namespace App\Filament\Resources\Inovasis\Pages;

use App\Filament\Resources\Inovasis\InovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;

class CreateInovasi extends CreateRecord
{
    protected static string $resource = InovasiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // INI YANG KEMAREN KITA LUPA BIKIN
    protected function afterCreate(): void
    {
        $record = $this->record;
        $currentUser = auth()->user();

        // Cari akun Ketum
        $ketum = \App\Models\User::where('role', 'admin')->first();

        if ($ketum) {
            \Filament\Notifications\Notification::make()
                ->title('Inovasi Baru Masuk!')
                ->body("Divisi {$currentUser->name} mengajukan usulan: '{$record->judul}'.")
                ->color('info')
                ->sendToDatabase($ketum);
        }
        // --- LOGIKA BARU: PUSH DATA KE API TEMEN (INTEROPERABILITAS) ---
        // Kita kirim data inovasi yang baru lo bikin ke sistem "Takarang Taruna"
        try {
            Http::post('https://takarangtaruna-production.up.railway.app/api/inovasi', [
                'judul'      => $record->judul,
                'deskripsi'  => $record->deskripsi,
                'user_id'    => 2, // ID user dummy di sistem temen lo (sesuaikan ss DBeaver kemarin)
                'status'     => 'pending',
                // tambahin field lain kalau temen lo minta (misal: kategori_id)
            ]);
        } catch (\Exception $e) {
            // Kalau internet mati atau server temen down, aplikasi lo gak bakal error merah
            // Cukup biarkan saja atau catat di log
        }
    }
}
