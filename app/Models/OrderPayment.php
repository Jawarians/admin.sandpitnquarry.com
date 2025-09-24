<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderPayment extends Model
{
    protected $casts = [
        'amount' => 'integer',
        'paid_amount' => 'integer',
        'created_at' => 'datetime',
        'due_at' => 'datetime',
        'paid_at' => 'datetime',
        'paid' => 'boolean',
        'order_payload' => 'array',
        'order_created' => 'boolean',
    ];

    protected $fillable = [
        'billplz_id',
        'user_id',
        'order_id',
        'collection_id',
        'paid',
        'state',
        'amount',
        'paid_amount',
        'due_at',
        'email',
        'phone',
        'name',
        'url',
        'paid_at',
        'slip_id',
        'slip_status',
        'x_signature',
        'creator_id',
        'order_payload',
        'order_created',
    ];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
