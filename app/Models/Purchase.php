<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Purchase extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
        'token_rate' => MoneyCast::class,
        'updated_at' => 'datetime',
        'user_id' => 'integer',
    ];

    protected $fillable = [
        'created_at',
        'creator_id',
        'token_rate',
        'updated_at',
        'user_id',
    ];

    public function business_price_purchase(): HasOne
    {
        return $this->hasOne(BusinessPricePurchase::class);
    }

    public function coin(): MorphOne
    {
        return $this->morphOne(Coin::class, 'coinable');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function route_details(): HasMany
    {
        return $this->hasMany(RouteDetail::class);
    }

    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(
            Route::class,
            'route_details',
            'purchase_id',
            'route_id',
        )->withPivot(
            'id',
            'address_id',
            'created_at',
            'creator_id',
            'purchase_id',
            'route_id',
            'site_id',
            'updated_at',
        )->withTimestamps();
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
