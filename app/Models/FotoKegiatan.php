<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoKegiatan extends Model
{
    protected $fillable = ['kegiatan_id', 'file_path'];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
