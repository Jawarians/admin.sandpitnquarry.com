<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'created_at',
        'creator_id',
        'pointable_id',
        'pointable_type',
        'quantity',
        'updated_at',
        'user_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
