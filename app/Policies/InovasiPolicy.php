<?php

namespace App\Policies;

use App\Models\Inovasi;
use App\Models\User;

class InovasiPolicy
{
    // MUNCULIN MENU DI SIDEBAR
    public function viewAny(User $user): bool
    {
        return true;
    }

    // IZIN LIHAT DETAIL DATA
    public function view(User $user, Inovasi $inovasi): bool
    {
        return $user->role === 'admin' || $user->id === $inovasi->user_id;
    }

    // IZIN BIKIN BARU (Ketum dilarang bikin)
    public function create(User $user): bool
    {
        return $user->role !== 'admin';
    }

    // IZIN EDIT (Sesuai arsitektur kita: Kunci permanen kalau udah diproses)
    public function update(User $user, Inovasi $inovasi): bool
    {
        if ($user->role === 'admin') return true;
        return $user->id === $inovasi->user_id && strtolower($inovasi->status) === 'pending';
    }

    // IZIN HAPUS
    public function delete(User $user, Inovasi $inovasi): bool
    {
        if ($user->role === 'admin') return true;
        return $user->id === $inovasi->user_id && strtolower($inovasi->status) === 'pending';
    }
}
