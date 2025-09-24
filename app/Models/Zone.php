<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_at',
        'creator_id',
        'deleted_at',
        'name',
        'state',
        'updated_at',
        'user_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function postcode_zones(): HasMany
    {
        return $this->hasMany(PostcodeZone::class);
    }

    public function price_items(): MorphMany
    {
        return $this->morphMany(PriceItem::class, 'price_itemable');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(AddressState::class, 'state', 'name');
    }
}
