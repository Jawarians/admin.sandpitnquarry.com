<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Site extends Model
{
    protected $appends = ['lat_lang'];

    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
    ];
    
    protected $fillable = [
        'name',
        'address',
        'postcode',
        'city',
        'state',
        'latitude',
        'longitude',
        'phone',
        'merchant_id',
        'creator_id'
    ];

    public function getLatLangAttribute()
    {
        return $this->latitude . ',' . $this->longitude;
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city', 'name');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }

    public function postcode(): BelongsTo
    {
        return $this->belongsTo(Postcode::class);
    }

    public function price_items(): MorphMany
    {
        return $this->morphMany(PriceItem::class, 'price_itemable');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state', 'name');
    }
}
