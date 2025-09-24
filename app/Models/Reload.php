<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Reload extends Model
{
    protected $casts = [
        'amount' => 'integer',
        'paid_amount' => 'integer',
        'coins' => 'integer',
        'free_coins' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'billplz_id',
        'user_id',
        'collection_id',
        'paid',
        'state',
        'amount',
        'paid_amount',
        'coins',
        'free_coins',
        'due_at',
        'email',
        'phone',
        'name',
        'url',
        'paid_at',
        'slip_id',
        'slip_status',
        'x_signature',
        'creator_id'
    ];

    public function coin(): MorphOne
    {
        return $this->morphOne(Coin::class, 'coinable');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
