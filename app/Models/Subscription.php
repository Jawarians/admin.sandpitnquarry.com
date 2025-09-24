<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'truck_id',
        'expired_at',
        'billplz_id',
        'user_id',
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
        'creator_id'
    ];

    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }   

    public function slip(): BelongsTo
    {
        return $this->belongsTo(Slip::class);
    }
  
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
