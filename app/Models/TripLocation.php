<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripLocation extends Model
{
    protected $fillable = [
        'created_at',
        'device',
        'latitude',
        'longitude',
        'trip_id',
        'unix_timestamp',
        'updated_at',
        'user_id',
    ];

    protected $table = 'trip_locations';

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}