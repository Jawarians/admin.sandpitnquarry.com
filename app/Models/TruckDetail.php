<?php

namespace App\Models;

use App\Traits\PushNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TruckDetail extends Model
{

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'length' => 'double',
        'width' => 'double',
        'height' => 'double',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'creator_id',
        'width',
        'height',
        'length',
        'model',
        'status',
        'truck_id',
        'wheel_id',
    ];

    protected $touches = ['truck'];

    use PushNotification;
    protected static function booted(): void
    {
        static::created(function (TruckDetail $truck_detail) {
            if ($truck_detail->status == 'Active') {

               
                $deviceToken = $truck_detail->truck->transporter->customer->fcm_token;
                $title = "Truck Activation";
                $body = "Your truck with registration plate number " . $truck_detail->truck->registration_plate_number . " has been activated successfully.";

                $data = [
                    'type' => 'Truck',
                    'truck_id' => (string) $truck_detail->truck->id,
                ];

                PushNotification::sendNotification($deviceToken, $title, $body, $data);

                Notification::create([
                    'notifiable_id' => $truck_detail->truck->transporter->customer->id,
                    'title' => $title,
                    'type' => 'TruckUpdate',
                    'content' => $body,
                    'path_id' => null, 
                    'seen' => false,
                    'read_at' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    /**
     * Get the current package for the truck.
     */
    public function currentSubscription(): HasOne
    {
        return $this->hasOne(Subscription::class)->ofMany([
            'expired_at' => 'min',
        ], function (Builder $query) {
            $query->whereHas('slip', function ($query) {
                $query->where('paid', true);
            });
            $query->where('expired_at', '>', now());
        });
    }

    /**
     * Get the active subscriptions for the truck.
     */
    public function activeSubscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'truck_id', 'id')
            ->whereHas('slip', function ($query) {
                $query->where('paid', true);
            })
            ->where('expired_at', '>', now())
            ->orderBy('expired_at', 'ASC');
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'subscriptions');
    }

    /**
     * The slips that belong to the truck.
     */
    public function slips(): BelongsToMany
    {
        return $this->belongsToMany(Slip::class, 'subscriptions');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    public function truck_status(): BelongsTo
    {
        return $this->belongsTo(TruckStatus::class, 'status', 'status');
    }

    public function wheel(): BelongsTo
    {
        return $this->belongsTo(Wheel::class, 'wheel_id', 'wheel');
    }
}
