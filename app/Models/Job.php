<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Job extends Model
{
    protected $appends = [
        'assigned',
        'cancelled',
        'completed',
        'ongoing',
    ];

    protected $casts = [
        'id' => 'integer',
        'job_quantity' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'order_id',
        'transporter_id',
        'creator_id'
    ];

    protected $touches = ['order'];

    public function getCompletedAttribute()
    {
        return Job::withCount([
            'trips as completed_trips_count' => function (Builder $query) {
                $query->whereHas('trip_details', function ($query) {
                    $query->where('status', 'Completed');
                });
            },
        ])
            ->find($this->id)
            ->completed_trips_count;
    }

    public function getAssignedAttribute()
    {
        return Job::withCount([
            'trips as assigned_trips_count' => function (Builder $query) {
                $query->whereHas('trip_details', function ($query) {
                    $query->where('status', 'Assigned');
                });
                $query->whereDoesntHave('trip_details', function ($query) {
                    $query->where('status', 'Cancelled');
                    $query->orWhere('status', 'Released');
                    $query->orWhere('status', 'Terminated');
                    $query->orWhere('status', 'Completed');
                });
            },
        ])
            ->find($this->id)
            ->assigned_trips_count;
    }

    public function getOngoingAttribute()
    {
        return Job::withCount([
            'trips as ongoing_trips_count' => function (Builder $query) {
                $query->whereHas('trip_details', function ($query) {
                    $query->where('status', 'Accepted');
                });
                $query->whereDoesntHave('trip_details', function ($query) {
                    $query->where('status', 'Cancelled');
                    $query->orWhere('status', 'Released');
                    $query->orWhere('status', 'Terminated');
                    $query->orWhere('status', 'Completed');
                });
            },
        ])
            ->find($this->id)
            ->ongoing_trips_count;
    }

    public function getCancelledAttribute()
    {
        return Job::withCount([
            'trips as cancelled_trips_count' => function (Builder $query) {
                $query->whereHas('trip_details', function ($query) {
                    $query->where('status', 'Cancelled');
                    $query->orWhere('status', 'Released');
                    $query->orWhere('status', 'Terminated');
                });
            },
        ])
            ->find($this->id)
            ->cancelled_trips_count;
    }

    /**
     * Scope a query to return app screen data users.
     */
    public function scopeJobEvent(Builder $query): void
    {
        $query->orderBy('jobs.id', 'desc')
            ->withCount([
                'trips as trips_count',
                'trips as assigned_trips_count' => function (Builder $query) {
                    $query->whereHas('trip_details', function ($query) {
                        $query->where('status', 'Assigned');
                    });
                    $query->whereDoesntHave('trip_details', function ($query) {
                        $query->where('status', 'Cancelled');
                        $query->orWhere('status', 'Released');
                        $query->orWhere('status', 'Terminated');
                    });
                },
                'trips as ongoing_trips_count' => function (Builder $query) {
                    $query->whereHas('trip_details', function ($query) {
                        $query->where('status', 'Accepted');
                    });
                    $query->whereDoesntHave('trip_details', function ($query) {
                        $query->where('status', 'Cancelled');
                        $query->orWhere('status', 'Released');
                        $query->orWhere('status', 'Terminated');
                        $query->orWhere('status', 'Completed');
                    });
                },
                'trips as completed_trips_count' => function (Builder $query) {
                    $query->whereHas('trip_details', function ($query) {
                        $query->where('status', 'Completed');
                    });
                },
                'trips as cancelled_trips_count' => function (Builder $query) {
                    $query->whereHas('trip_details', function ($query) {
                        $query->where('status', 'Cancelled');
                        $query->orWhere('status', 'Released');
                        $query->orWhere('status', 'Terminated');
                    });
                },
            ])
            ->withSum('latest as job_quantity', 'quantity')
            ->with([
                'assigned_trips' => function ($query) {
                    $query->with('latest.assignment.driver.user');
                    $query->whereHas('trip_details', function ($query) {
                        $query->where('status', 'Assigned');
                    });
                    $query->whereDoesntHave('trip_details', function ($query) {
                        $query->where('status', 'Cancelled');
                        $query->orWhere('status', 'Released');
                        $query->orWhere('status', 'Terminated');
                    });
                },
                'latest',
                'order.address.latest.contacts',
                'order.latest.site.merchant',
                "order.oldest.site",
                'order.product.featured_image',
                'order.transportation_amount',
                "order.wheel",
                'trips.latest.assignment.driver.user',
                'trips.latest.assignment.truck',
                'trips.latest.trip_status',
            ]);
    }

    public function assigned_trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function job_details(): HasMany
    {
        return $this->hasMany(JobDetail::class);
    }

    // Backwards-compatible alias
    public function jobDetails(): HasMany
    {
        return $this->job_details();
    }

    public function latest(): HasOne
    {
        return $this->hasOne(JobDetail::class)->latestOfMany();
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(JobDetail::class)->oldestOfMany();
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Backwards-compatible relation expected by controllers
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    // Backwards-compatible relation used by controllers/views
    public function jobStatus(): BelongsTo
    {
        return $this->belongsTo(JobStatus::class, 'status', 'status');
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
