<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerReferrer extends Model
{
    protected $fillable = [
        'user_id',
        'customer_referrer_percent_id',
        'percent',
        'creator_id'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}