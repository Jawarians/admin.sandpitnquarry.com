<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $fillable = [
        'account_id',
        'amount',
        'created_at',
        'creator_id',
        'transactionable_id',
        'transactionable_type',
        'updated_at'
    ];

    protected static function booted(): void
    {
        static::creating(function (Transaction $transaction) {
            if (DB::table('morphs')->where('qualified_name', $transaction['transactionable_type'])->exists()) {
                $morph =  DB::table('morphs')->where('qualified_name', $transaction['transactionable_type'])->first();
                $transaction['transactionable_type'] = $morph->type;
            }
            return true;
        });
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }
}
