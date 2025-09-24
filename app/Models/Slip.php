<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Slip extends Model
{

    protected $fillable = [
        'amount',
        'billplz_id',
        'created_at',
        'creator_id',
        'collection_id',
        'due_at',
        'email',
        'fee_id',
        'name',
        'package_id',
        'paid',
        'paid_amount',
        'paid_at',
        'phone',
        'state',
        'transaction_id',
        'transaction_status',
        'transporter_id',
        'updated_at',
        'upgrade',
        'url',
        'user_id',
        'x_signature',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'paid' => 'boolean',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function fee(): BelongsTo
    {
        return $this->belongsTo(Fee::class);
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

    /**
     * The trucks that belong to the slip.
     */
    public function trucks(): BelongsToMany
    {
        return $this->belongsToMany(Truck::class, 'subscriptions');
    }
}
