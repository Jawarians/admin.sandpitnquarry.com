<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessPriceAmount extends Model
{
    protected $fillable = [
        'amount',
        'business_price_amountable_id',
        'business_price_amountable_type',
        'business_price_order_id',
        'created_at',
        'creator_id',
        'updated_at',
    ];

    public function business_price_order(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceOrder::class);
    }
}
