<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransporterAccount extends Model
{

    protected $fillable = [
        'name',
        'number',
        'bank',
        'transporter_id',
        'approve_at',
        'creator_id'
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(TripStatus::class, 'bank', 'name');
    }
}