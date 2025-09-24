<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Log;

class Transporter extends Model
{
    use Notifiable;

    protected static function booted(): void
    {
        static::creating(function (Transporter $transporter) {
            $transporter['name'] = strtoupper($transporter["name"]);
            $transporter['registration_number'] = strtoupper($transporter["registration_number"]);
            if ($transporter['creator_id'] == null) {
                $transporter['creator_id'] = $transporter['user_id'];
            }
        });

        static::created(function (Transporter $transporter) {
            Driver::create([
                'transporter_id' => $transporter['id'],
                'user_id' => $transporter->user_id,
                'creator_id' => $transporter->user_id,
            ]);
            $auth = app('firebase.auth');
            $auth->setCustomUserClaims(strval($transporter->user_id), [
                'transporter' => json_encode(
                    array(
                        'id' => $transporter->id,
                        'name' => $transporter->name,
                        'registration_number' => $transporter->registration_number,
                        'type' => $transporter->type,
                        'sound_notification' => $transporter->sound_notification,
                    )
                )
            ]);
        });
    }

    protected $fillable = [
        'creator_id',
        'name',
        'registration_number',
        'type',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'debits_sum_amount' => 'integer',
        'sound_notification' => 'boolean',
    ];

    function getDeviceTokens()
    {
        return $this->tokens->pluck('token')->unique()->toArray();
    }

    /**
     * Specifies the user's FCM tokens
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->getDeviceTokens();
    }

    public function company_type(): BelongsTo
    {
        return $this->belongsTo(CompanyType::class, 'type', 'type');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function current_slip(): HasOne
    {
        // return $this->hasOne(Slip::class)->ofMany([
        //     'id' => 'max',
        // ], function (Builder $query) {
        //     $query->where('paid', true);
        // })->withDefault([
        //             'id' => 0,
        //             'paid' => false,
        //             'package_id' => 0,
        //         ]);

        $currentSlipRelation = $this->hasOne(Slip::class) // Establishes a HasOne relationship with Slip.
            // Assumes 'slips' table has a 'transporter_id' foreign key.
            ->ofMany([
                'package_id' => 'max', // Selects the slip with the maximum package_id.
                'id' => 'max',      // Optionally, add another aggregate for tie-breaking if package_ids can be the same.
            ], function (Builder $query) {
                // These are additional constraints applied to the slips *of this transporter*
                // before determining the one with the max package_id.
                $query->where('paid', true); // Ensures the slip is paid.
                $query->whereHas('subscriptions.truck.latest', function (Builder $truckDetailQuery) {
                    $truckDetailQuery->where('status', 'Active');
                });
                $query->whereHas('subscriptions', function (Builder $subscriptionsQuery) {
                    $subscriptionsQuery->where('expired_at', '>', now());
                });
            })
            ->withDefault([ // Provides a default Slip model if no matching slip is found.
                'id' => 0,
                'paid' => false,
                'package_id' => 0,
                // Consider adding other relevant default fields for the Slip model here.
            ]);

        return $currentSlipRelation;
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function debits(): HasMany
    {
        return $this->hasMany(Debit::class);
    }

    public function drivers(): HasMany
    {
        return $this->hasMany(Driver::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function slips(): HasMany
    {
        return $this->hasMany(Slip::class);
    }

    public function tokens(): MorphMany
    {
        return $this->morphMany(Token::class, 'tokenable');
    }

    public function trucks(): HasMany
    {
        return $this->hasMany(Truck::class);
    }
}
