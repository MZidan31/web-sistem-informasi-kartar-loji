<?php

namespace App\Filament\Resources\Kegiatans\Pages;

use App\Models\User;
use App\Filament\Resources\Kegiatans\KegiatanResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        $record = $this->record;
        $currentUser = auth()->user();

        // JIKA YANG SAVE ADALAH KETUM
        if ($currentUser->role === 'admin') {
            $pengusul = \App\Models\User::find($record->user_id);
            if ($pengusul) {
                $statusUpper = strtoupper($record->status);
                $isDitolak = strtolower($record->status) === 'ditolak';

                $pesanBody = "Kegiatan '{$record->judul}' berstatus: {$statusUpper}.";
                if (!empty($record->catatan)) {
                    $pesanBody .= "\n\nCatatan Ketum: " . $record->catatan;
                }

                // Tembak ke lonceng Divisi
                \Filament\Notifications\Notification::make()
                    ->title('Status Kegiatan Diperbarui')
                    ->body($pesanBody)
                    ->color($isDitolak ? 'danger' : 'success')
                    ->sendToDatabase($pengusul);
            }
        }
        // JIKA YANG SAVE ADALAH DIVISI (Lagi update data atau upload foto)
        else {
            $ketum = \App\Models\User::where('role', 'admin')->first();

            if ($ketum) {
                // Tembak ke lonceng Ketum
                \Filament\Notifications\Notification::make()
                    ->title('Update Kegiatan')
                    ->body("Divisi {$currentUser->name} memperbarui data kegiatan '{$record->judul}'.")
                    ->color('warning')
                    ->sendToDatabase($ketum);
            }
        }
    }
}
