<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessPricePurchase extends Model
{
    protected $fillable = [
        'business_price_id',
        'created_at',
        'creator_id',
        'id',
        'purchase_id',
        'updated_at',
    ];

    public function business_price(): BelongsTo
    {
        return $this->belongsTo(BusinessPrice::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }
}
