<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceItem extends Model
{
    protected $casts = [
        'amount' => MoneyCast::class,
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
        'product_id' => 'integer',
        'wheel_id' => 'integer',
    ];

    protected $fillable = [
        'created_at',
        'creator_id',
        'amount',
        'price_id',
        'price_itemable_type',
        'price_itemable_id',
        'product_id',
        'updated_at',
        'wheel_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
