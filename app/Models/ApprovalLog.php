<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ApprovalLog extends Model
{
    protected $fillable = ['approvalable_id', 'approvalable_type', 'approvedBy', 'status', 'catatan'];

    public function approvalable(): MorphTo
    {
        return $this->morphTo();
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approvedBy');
    }
}
