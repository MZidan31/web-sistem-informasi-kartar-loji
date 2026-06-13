<?php

namespace App\Filament\Pages;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Profil')
                    ->description('Perbarui informasi diri untuk identitas pada portal SIKT.')
                    ->extraAttributes(['class' => 'sikt-modern-card'])
                    ->schema([
                        FileUpload::make('avatar_url')
                            ->label('Foto Profil Pribadi')
                            ->avatar()
                            ->directory('avatars')
                            ->disk('public')
                            ->imageEditor()
                            ->circleCropper()
                            ->maxSize(1024)
                            ->extraAttributes(['class' => 'sikt-avatar-upload']),
                        $this->getNameFormComponent()
                            ->label('Nama Lengkap')
                            ->extraInputAttributes(['class' => 'sikt-soft-input']),
                        $this->getEmailFormComponent()
                            ->label('Alamat Email')
                            ->extraInputAttributes(['class' => 'sikt-soft-input']),
                    ]),
                Section::make('Keamanan & Kata Sandi')
                    ->description('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.')
                    ->extraAttributes(['class' => 'sikt-modern-card'])
                    ->schema([
                        $this->getCurrentPasswordFormComponent()
                            ->label('Kata Sandi Lama')
                            ->extraInputAttributes(['class' => 'sikt-soft-input']),
                        $this->getPasswordFormComponent()
                            ->label('Kata Sandi Baru')
                            ->extraInputAttributes(['class' => 'sikt-soft-input']),
                        $this->getPasswordConfirmationFormComponent()
                            ->label('Konfirmasi Kata Sandi Baru')
                            ->extraInputAttributes(['class' => 'sikt-soft-input']),
                    ]),
            ]);
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return $this->backAction()->label('Kembali');
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('back')
                ->label('Kembali ke Dashboard')
                ->url(filament()->getUrl())
                ->color('gray'),
        ];
    }
}
