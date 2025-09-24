<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessPriceDetailWheel extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'business_price_detail_id',
        'created_at',
        'creator_id',
        'updated_at',
        'wheel_id'
    ];

    public function business_price_detail(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceDetail::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wheel(): BelongsTo
    {
        return $this->belongsTo(Wheel::class, 'wheel_id', 'wheel');
    }
}
