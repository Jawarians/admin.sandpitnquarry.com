<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountDetailItem extends Model
{
    protected $casts = [
        'account_detail_id' => 'integer',
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
        'limit' => MoneyCast::class,
        'term' => 'integer',
    ];

    protected $fillable = [
        'account_detail_id',
        'created_at',
        'creator_id',
        'limit',
        'minimize',
        'status',
        'term',
        'updated_at',
    ];

    protected $touches = ['account_detail'];

    public function account_detail(): BelongsTo
    {
        return $this->belongsTo(AccountDetail::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
