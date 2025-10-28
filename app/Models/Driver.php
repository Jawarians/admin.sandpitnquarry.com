<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;

class Driver extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'customer_id',
        'creator_id',
        'transporter_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
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

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function current(): HasOne
    {
        return $this->hasOne(Assignment::class)->latestOfMany();
    }

    public function driver_details(): HasMany
    {
        return $this->hasMany(DriverDetail::class);
    }

    public function banned_drivers(): HasMany
    {
        return $this->hasMany(BannedDrivers::class);
    }

    public function banned_driver(): HasOne
    {
        return $this->HasOne(BannedDrivers::class);
    }

    public function latest(): HasOne
    {
        return $this->hasOne(DriverDetail::class)->latestOfMany();
    }

    public function tokens(): MorphMany
    {
        return $this->morphMany(Token::class, 'tokenable');
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
