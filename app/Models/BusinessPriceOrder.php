<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessPriceOrder extends Model
{
    protected $fillable = [
        'business_price_item_id',
        'created_at',
        'creator_id',
        'id',
        'updated_at'
    ];

    public function business_price_amounts(): HasMany
    {
        return $this->hasMany(BusinessPriceAmount::class);
    }

    public function business_price_item(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceItem::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'id', 'id');
    }
}
