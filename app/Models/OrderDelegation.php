<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDelegation extends Model
{
    protected $fillable = [
        'available',
        'created_at',
        'creator_id',
        'delegated',
        'end_at',
        'order_detail_id',
        'start_at',
        'status',
        'total',
        'updated_at',
    ];

    public function order_detail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function order_status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'status');
    }
}
