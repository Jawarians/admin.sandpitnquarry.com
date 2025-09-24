<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referrer extends Model
{
    protected $fillable = [
        'id',
        'affiliate_id',
        'referrer_id',
        'user_id',
        'creator_id',
        'created_at',
        'updated_at'
    ];

    protected static function booted(): void
    {
        static::creating(function (Referrer $referrer) {
            $referrer['user_id'] = 0;
            if (empty($referrer['creator_id']) || !is_int($referrer['creator_id']) || $referrer['creator_id'] < 1) {
                $referrer['creator_id'] = $referrer['user_id'];
            }
            return true;
        });
    }
    
    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }    
}