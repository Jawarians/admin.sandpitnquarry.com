<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Package extends Model
{
    protected $appends = [
        'color',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'service_charge' => 'double',
        'payment_term' => 'integer',
        'order_delay_minutes' => 'integer',
        'transporter_introducer' => 'double',
        'customer_introducer' => 'double',
        'show' => 'boolean',
        'trial' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'badge',
        'created_at',
        'creator_id',
        'customer_introducer',
        'discount',
        'image',
        'name',
        'order_delay_minutes',
        'payment_term',
        'period',
        'service_charge',
        'show',
        'transporter_introducer',
        'trial',
        'updated_at',
    ];

    public function getColorAttribute()
    {
        $rgba = substr($this->rgba, 5, -1);
        $color = explode(',', $rgba);
        return array(
            'red' => (int) trim($color[0]),
            'green' => (int) trim($color[1]),
            'blue' => (int) trim($color[2]),
            'alpha' => (float) trim($color[3]),
        );
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

    public function slips(): HasMany
    {
        return $this->hasMany(Slip::class);
    }

    public function transporter(): HasMany
    {
        return $this->hasMany(Transporter::class);
    }

    /**
     * Get the current pricing for the package.
     */
    public function current_fee(): HasOne
    {
        return $this->hasOne(Fee::class)->ofMany([
            'published_at' => 'max',
            'id' => 'max',
        ], function (Builder $query) {
            $query->where('published_at', '<', now());
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
