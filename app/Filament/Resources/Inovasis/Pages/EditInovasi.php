<?php

namespace App\Filament\Resources\Inovasis\Pages;

use App\Filament\Resources\Inovasis\InovasiResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditInovasi extends EditRecord
{
    protected static string $resource = InovasiResource::class;

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
            $pengusul = User::find($record->user_id);
            if ($pengusul) {
                $statusUpper = strtoupper($record->status);
                $isDitolak = strtolower($record->status) === 'ditolak';

                $pesanBody = "Usulan '{$record->judul}' berstatus: " . strtoupper($record->status);
                if (!empty($record->catatan)) { // Pakai 'catatan' bukan 'catatan_validasi'
                    $pesanBody .= "\n\nCatatan Ketum: " . $record->catatan;
                }

                // Tembak ke lonceng Divisi
                \Filament\Notifications\Notification::make()
                    ->title('Status Inovasi Diperbarui')
                    ->body($pesanBody)
                    ->color($isDitolak ? 'danger' : 'success')
                    ->sendToDatabase($pengusul);
            }
        }
        // JIKA YANG SAVE ADALAH DIVISI (Lagi update data pas status masih pending)
        else {
            $ketum = User::where('role', 'admin')->first();

            if ($ketum) {
                // Tembak ke lonceng Ketum
                \Filament\Notifications\Notification::make()
                    ->title('Update Inovasi')
                    ->body("Divisi {$currentUser->name} memperbarui usulan '{$record->judul}'.")
                    ->color('warning')
                    ->sendToDatabase($ketum);
            }
        }
    }
} // <--- INI YANG LO LUPA COPAS TADI!
