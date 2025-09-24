<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Payment extends Model
{
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'remark',
        'reference_number',
        'paid_at',
        'creator_id'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function document(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(PaymentDetail::class)->latestOfMany();
    }

    public function payment_details(): HasMany
    {
        return $this->hasMany(PaymentDetail::class);
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
