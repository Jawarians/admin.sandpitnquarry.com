<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BusinessPriceItem extends Model
{
    protected $fillable = [
        'business_price_detail_id',
        'created_at',
        'creator_id',
        'product_id',
        'updated_at'
    ];

    public function business_price_detail(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceDetail::class);
    }

    public function business_price_item_details(): HasMany
    {
        return $this->hasMany(BusinessPriceItemDetail::class);
    }

    public function business_price_orders(): HasMany
    {
        return $this->hasMany(BusinessPriceOrder::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(BusinessPriceItemDetail::class)->latestOfMany();
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(BusinessPriceItemDetail::class)->oldestOfMany();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
