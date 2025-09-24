<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Postcode extends Model
{
    protected $primaryKey = 'postcode';

    public $incrementing = false;

    protected $fillable = [
        'active',
        'created_at',
        'creator_id',
        'postcode',
        'updated_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function postcode_zone(): HasOne
    {
        return $this->hasOne(PostcodeZone::class, 'postcode', 'postcode');
    }

    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'postcode_zones', 'postcode',  'zone_id');
    }
}
