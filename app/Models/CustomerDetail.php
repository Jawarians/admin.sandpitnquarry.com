<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerDetail extends Model
{
    protected $fillable = [
        'customer_id',
        'type',
        'value',
        'creator_id',
        'created_at',
        'updated_at',
    ];

    protected static function booted(): void
    {
        static::creating(function (CustomerDetail $customer_detail) {
            if (empty($customer_detail['creator_id']) || !is_int($customer_detail['creator_id']) || $customer_detail['creator_id'] < 1) {
                $customer_detail['creator_id'] = $customer_detail['customer_id'];
            }
        });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
