<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Filament\Pages\EditProfile;
use Illuminate\Support\Facades\Storage;

class MyProfile extends Page
{
    public static function getNavigationIcon(): string | \BackedEnum | null
    {
        return 'heroicon-o-user';
    }

    public static function getNavigationLabel(): string
    {
        return 'Profil';
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Detail Profil';
    }

    public static function getNavigationSort(): ?int
    {
        return 100;
    }

    protected string $view = 'filament.pages.my-profile';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->label('Edit Profile')
                ->icon('heroicon-m-pencil-square')
                ->url(fn (): string => EditProfile::getUrl())
                ->color('primary'),
        ];
    }
}
