<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Withdrawal extends Model
{
    protected $casts = [
        'amounts' => MoneyCast::class,
        'coins' => MoneyCast::class,
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
    ];

    protected $fillable = [
        'amounts',
        'coins',
        'created_at',
        'creator_id',
        'customer_account_id',
        'updated_at',
        'user_id',
    ];


    public function bank(): BelongsTo
    {
        return $this->belongsTo(CustomerAccount::class, 'user_id', 'user_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function document(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable')->latestOfMany();
    }

    public function latest(): HasOne
    {
        return $this->hasOne(WithdrawalDetail::class)->latestOfMany();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function withdrawal_details(): HasMany
    {
        return $this->hasMany(WithdrawalDetail::class);
    }
}
