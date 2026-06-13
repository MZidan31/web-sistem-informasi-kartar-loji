<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoInovasi extends Model
{
    protected $fillable = ['inovasi_id', 'file_path'];

    public function inovasi(): BelongsTo
    {
        return $this->belongsTo(Inovasi::class);
    }
}
