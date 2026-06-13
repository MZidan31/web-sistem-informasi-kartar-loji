<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'kategori_id',
        'tanggal_diajukan',
        'tanggal_berjalan',
        'deskripsi',
        'status',
        'catatan'
    ];

    /**
     * Relasi ke User (Divisi Pengusul)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Foto (Bukti Pelaksanaan)
     */
    public function fotoKegiatans(): HasMany
    {
        return $this->hasMany(FotoKegiatan::class);
    }
}
