<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'created_at',
        'creator_id',
        'updated_at',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::creating(function (Address $address) {
            if (empty($address['creator_id']) || !is_int($address['creator_id']) || $address['creator_id'] < 1) {
                $address['creator_id'] = $address['user_id'];
            }
        });
    }

    public function address_details(): HasMany
    {
        return $this->hasMany(AddressDetail::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(AddressDetail::class)->latestOfMany();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
