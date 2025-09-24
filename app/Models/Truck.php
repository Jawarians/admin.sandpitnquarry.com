<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Log;

class Truck extends Model
{

    protected $fillable = [
        'registration_plate_number',
        'transporter_id',
        'package_id',
        'creator_id'
    ];

    /**
     * Get the current package for the truck.
     */
    public function current_subscription(): HasOne
    {
        $currentSubscriptionQuery = $this->hasOne(Subscription::class)->ofMany([
            'expired_at' => 'max',
        ], function (Builder $query) {
            $query->whereHas('slip', function ($query) {
                $query->where('paid', true);
            });
            $query->where('expired_at', '>', now());
        });
        return $currentSubscriptionQuery;
    }

    /**
     * Get the active subscriptions for the truck.
     */
    public function activeSubscriptions(): HasMany
    {
        $activeSubscriptionsQuery = $this->hasMany(Subscription::class, 'truck_id', 'id')
            ->whereHas('slip', function ($query) {
                $query->where('paid', true);
            })
            ->where('expired_at', '>', now())
            ->orderBy('expired_at', 'ASC');

        return $activeSubscriptionsQuery;
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function current(): HasOne
    {
        return $this->hasOne(Assignment::class)->latestOfMany();
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(TruckDetail::class)->latestOfMany();
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'subscriptions');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * The slips that belong to the truck.
     */
    public function slips(): BelongsToMany
    {
        return $this->belongsToMany(Slip::class, 'subscriptions');
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

     public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function truck_details(): HasMany
    {
        return $this->hasMany(TruckDetail::class);
    }
}
