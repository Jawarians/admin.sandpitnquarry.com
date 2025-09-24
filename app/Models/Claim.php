<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Claim extends Model
{
    protected $fillable = [
        'amount',
        'created_at',
        'creator_id',
        'customer_account_id',
        'withdraw_charge',
        'withdraw_amount',
        'updated_at',
    ];

    public function claim_details(): HasMany
    {
        return $this->hasMany(ClaimDetail::class);
    }

    public function latest(): HasOne
    {
        return $this->hasOne(ClaimDetail::class)->latestOfMany();
    }

    public function customer_account(): BelongsTo
    {
        return $this->belongsTo(CustomerAccount::class, 'customer_account_id', 'id');
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(ClaimDetail::class)->oldestOfMany();
    }
}
