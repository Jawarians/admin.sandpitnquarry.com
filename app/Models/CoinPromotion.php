<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoinPromotion extends Model
{
    protected $fillable = [
        'id',
        'start_at',
        'creator_id',
        'created_at',
        'updated_at',
    ];
    
    protected $casts = [
        'start_at' => 'datetime',
    ];

    public function coin_promotion_details(): HasMany
    {
        return $this->hasMany(CoinPromotionDetail::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
