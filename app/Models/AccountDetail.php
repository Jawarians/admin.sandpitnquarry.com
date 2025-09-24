<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccountDetail extends Model
{
    protected $appends = ['code_prefix', 'code_suffix'];

    protected $casts = [
        'account_id' => 'integer',
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
    ];

    protected $fillable = [
        'account_id',
        'code',
        'created_at',
        'creator_id',
        'remark',
        'status',
        'updated_at',
    ];

    protected $touches = ['account'];

    public function getCodePrefixAttribute()
    {
        return substr($this->code, 0, 3);
    }

    public function getCodeSuffixAttribute()
    {
        return substr($this->code, 3);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function account_detail_items(): HasMany
    {
        return $this->hasMany(AccountDetailItem::class);
    }

    public function account_status(): BelongsTo
    {
        return $this->belongsTo(AccountStatus::class, 'status', 'status');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(AccountDetailItem::class)->latestOfMany();
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(AccountDetailItem::class)->oldestOfMany();
    }
}
