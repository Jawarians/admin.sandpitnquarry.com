<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Bonus extends Model
{
    protected $table = 'reloads';

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
}
