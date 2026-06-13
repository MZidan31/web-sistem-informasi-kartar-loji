<?php

namespace App\Policies;

use App\Models\Kegiatan;
use App\Models\User;

class KegiatanPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Kegiatan $kegiatan): bool
    {
        return $user->role === 'admin' || $user->id === $kegiatan->user_id;
    }

    public function create(User $user): bool
    {
        return $user->role !== 'admin';
    }

    public function update(User $user, Kegiatan $kegiatan): bool
    {
        if ($user->role === 'admin') return true;

        // Divisi bisa masuk form Edit kalau:
        // 1. Pending (buat ngedit usulan)
        // 2. Disetujui (KHUSUS buat nambah foto dokumentasi)
        $status = strtolower($kegiatan->status);
        return $user->id === $kegiatan->user_id && in_array($status, ['pending', 'disetujui']);
    }

    public function delete(User $user, Kegiatan $kegiatan): bool
    {
        if ($user->role === 'admin') return true;
        return $user->id === $kegiatan->user_id && strtolower($kegiatan->status) === 'pending';
    }
}
