<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Route extends Model
{
    protected $casts = [
        'origin_latitude' => 'double',
        'origin_latitude' => 'double',
        'destination_latitude' => 'double',
        'destination_longitude' => 'double',
    ];

    protected $fillable = [
        'created_at',
        'creator_id',
        'departure_at',
        'destination_addresss',
        'destination_latitude',
        'destination_longitude',
        'distance_text',
        'distance_value',
        'duration_text',
        'duration_value',
        'origin_addresss',
        'origin_latitude',
        'origin_longitude',
        'traffic_model',
        'traffic_text',
        'traffic_value',
        'updated_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function purchases(): BelongsToMany
    {
        return $this->belongsToMany(
            Purchase::class,
            'route_details',
            'route_id',
            'purchase_id',
        )->withPivot(
            'id',
            'address_id',
            'created_at',
            'creator_id',
            'purchase_id',
            'route_id',
            'site_id',
            'updated_at',
        )->withTimestamps();
    }

    public function route_detail(): HasOne
    {
        return $this->hasOne(RouteDetail::class);
    }
}
