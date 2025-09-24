<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TripReason extends Model
{
    protected $fillable = [
        'trip_id',
        'trip_reasonable_id',
        'trip_reasonable_type',
        'creator_id'
    ];

    public function trip_reasonable(): MorphTo
    {
        return $this->morphTo();
    }
}