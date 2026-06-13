<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

// WAJIB IMPLEMENTS FilamentUser biar dikunci sama Filament
class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'avatar_url'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    /**
     * KUNCI PINTU FILAMENT:
     * Cuma role di bawah ini yang bisa buka http://localhost:8000/admin
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role, ['admin', 'divisi']);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }
}
