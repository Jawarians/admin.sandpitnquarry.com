<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Invoice extends Model
{
   protected $fillable = [
        'user_id',
        'creator_id'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function coin(): MorphOne
    {
        return $this->morphOne(Coin::class, 'coinable');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function invoice_orders(): HasMany
    {
        return $this->hasMany(InvoiceOrder::class);
    }
    
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceOrder::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }    

    public function point(): MorphOne
    {
        return $this->morphOne(Point::class, 'pointable');
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }   
}
