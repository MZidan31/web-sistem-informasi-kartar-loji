<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation; // <--- Tambah ini
use App\Models\User; // <--- Tambah ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paksa Laravel ngenalin 'App\Models\User' secara konsisten
        Relation::morphMap([
            'App\Models\User' => User::class,
        ]);
    }
}
