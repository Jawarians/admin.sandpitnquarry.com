<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class BusinessPriceItemDetail extends Model
{
    protected $appends = ['total'];

    protected $fillable = [
        'business_price_item_id',
        'created_at',
        'creator_id',
        'fee',
        'price',
        'quantity',
        'select',
        'updated_at',
    ];

    protected $touches = ['business_price_item'];

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function business_price_item(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceItem::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function order_amounts(): MorphMany
    {
        return $this->morphMany(Order::class, 'order_amountable');
    }
}
