<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Account extends Model
{
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
        'transactions_sum_amount' => 'integer',
    ];

    protected $fillable = [
        'created_at',
        'creator_id',
        'updated_at',
        'user_id',
    ];

    public function account_details(): HasMany
    {
        return $this->hasMany(AccountDetail::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(AccountDetail::class)->latestOfMany();
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(AccountDetail::class)->oldestOfMany();
    }

    public function scopeTotalTransactions(Builder $query): void
    {
        $query->withSum(
            ['transactions' => function ($query) {
                $query->whereHasMorph(
                    'transactionable',
                    [Invoice::class, Order::class, Payment::class, Purchase::class],
                    function ($query, $type) {
                        if ($type == 'App\Models\Payment') {
                            $query->whereHas('latest', function ($query) {
                                $query->where('status', 'Approve');
                            });
                        }
                    }
                );
            }],
            'amount'
        );
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
