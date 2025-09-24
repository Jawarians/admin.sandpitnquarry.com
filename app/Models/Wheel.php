<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wheel extends Model
{
    protected $primaryKey = 'wheel';

    public $incrementing = false;

    protected $casts = [
        'load' => 'boolean',
        'tonne' => 'boolean',
    ];

    protected $fillable = [
        'wheel',
        'capacity',
        'load',
        'tonne',
        'creator_id'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
