<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Trip extends Model
{

    protected static function booted(): void
    {
        static::creating(function (Trip $trip) {
            $trip['code']  = rand(100001, 999999);
        });
    }

    protected $casts = [
        'id' => 'integer',
        'driver_id' => 'integer',
        'status' => 'string',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'actual_quantity',
        'code',
        'created_at',
        'creator_id',
        'driver_id',
        'expected_quantity',
        'job_id',
        'status',
        'updated_at',
        'user_id',
        'waiting_minutes',
    ];

    protected $touches = ['job'];

    /**
     * Scope a query to return app screen data users.
     */
    public function scopeTripEvent(Builder $query): void
    {
        $query->with(
            "job.order.address.latest.contacts",
            "job.order.latest.site",
            "job.order.latest.order_contacts",
            "job.order.oldest.site",
            "job.order.product.featured_image",
            "job.order.transportation_amount",
            "job.order.user.referrer.affiliate.user.company.latest",
            "job.order.user.averageWaitingMinute",
            "job.order.wheel",
            "latest.assignment.driver.user",
            "latest.assignment.truck.transporter.owner.referrer",
            "latest.trip_status",
            "trip_reason",
        );
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function coin(): MorphOne
    {
        return $this->morphOne(Coin::class, 'coinable');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function debit(): MorphOne
    {
        return $this->morphOne(Debit::class, 'debitable');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function latest(): HasOne
    {
        return $this->hasOne(TripDetail::class)->latestOfMany();
    }

    public function locations(): HasMany
    {
        return $this->hasMany(TripLocation::class);
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(TripDetail::class)->oldestOfMany();
    }

    public function trip_details(): HasMany
    {
        return $this->hasMany(TripDetail::class);
    }

    public function trip_reason(): HasOne
    {
        return $this->hasOne(TripReason::class);
    }

    public function trip_status(): BelongsTo
    {
        return $this->belongsTo(TripStatus::class, 'status', 'status');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function whats_app_conversation(): MorphOne
    {
        return $this->morphOne(WhatsAppConversation::class, 'whats_app_conversationable');
    }
}
