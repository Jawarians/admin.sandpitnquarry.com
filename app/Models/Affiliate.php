<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Affiliate extends Model
{
    protected $fillable = [
        'id',
        'initial',
        'active',
        'red',
        'green',
        'blue',
        'creator_id'
    ];

    public function user(): BelongsTo
    {        
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {        
        return $this->belongsTo(Customer::class, 'id', 'id');
    }

    public function referrers(): HasMany
    {
        return $this->hasMany(Referrer::class);
    }
}