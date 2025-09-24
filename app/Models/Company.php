<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    protected $fillable = [
        'id',
        'creator_id',
        'created_at',
        'updated_at',
    ];

    public function company_details(): HasMany
    {
        return $this->hasMany(CompanyDetail::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(CompanyDetail::class)->latestOfMany();
    }
   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

}
