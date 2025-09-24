<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoinPromotionDetail extends Model
{
    protected $fillable = [
        
        'id',
        'coin_promotion_id',
        'price',
        'coins',
        'free_coins',
        'created_at',
        'updated_at',
        'creator_id',
        'discount',
        'promotion_images'
    ];

    public function coin_promotion(): BelongsTo
    {
        return $this->belongsTo(CoinPromotion::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
