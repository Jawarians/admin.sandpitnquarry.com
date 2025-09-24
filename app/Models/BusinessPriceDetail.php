<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class BusinessPriceDetail extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'attention',
        'business_price_id',
        'created_at',
        'creator_id',
        'end_date',
        'note',
        'reference_number',
        'remark',
        'start_date',
        'status',
        'term',
        'type',
        'unit',
        'updated_at',
    ];

    protected $touches = ['business_price'];

    protected static function booted(): void
    {
        static::creating(function (BusinessPriceDetail $business_price_detail) {
            $business_price_detail['reference_number'] = !is_null($business_price_detail['reference_number']) && strlen($business_price_detail['reference_number']) > 1 ? $business_price_detail['reference_number'] : $business_price_detail['business_price_id'];
            $business_price_detail['remark'] = is_null($business_price_detail['remark']) ? null : ucwords(strtolower($business_price_detail['remark']));
            $business_price_detail['term'] = is_null($business_price_detail['term']) ? 0 : $business_price_detail['term'];
        });
    }

    public function business_price(): BelongsTo
    {
        return $this->belongsTo(BusinessPrice::class);
    }

    public function business_price_detail_wheels(): HasMany
    {
        return $this->hasMany(BusinessPriceDetailWheel::class);
    }

    public function business_price_items(): HasMany
    {
        return $this->hasMany(BusinessPriceItem::class);
    }

    public function business_price_status(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceStatus::class, 'status', 'status');
    }

    public function business_price_type(): BelongsTo
    {
        return $this->belongsTo(BusinessPriceType::class, 'type', 'type');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function orders(): MorphMany
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'business_price_items');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wheels(): BelongsToMany
    {
        return $this->belongsToMany(Wheel::class, 'business_price_detail_wheels', 'business_price_detail_id',  'wheel_id');
    }
}
