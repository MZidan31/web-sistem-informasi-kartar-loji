<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inovasi extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'kategori_id',
        'tanggal_diajukan',
        'deskripsi',
        'status',
        'catatan'
    ];

    /**
     * Relasi ke User (Aktor Pengusul/Divisi)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Foto (Dokumentasi)
     */
    public function fotoInovasis(): HasMany
    {
        return $this->hasMany(FotoInovasi::class);
    }
}
