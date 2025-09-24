<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransporterReferrerPercent extends Model
{
    protected $fillable = [
        'created_at',
        'creator_id',
        'percent',
        'start_at',
        'updated_at',
    ];

   public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}