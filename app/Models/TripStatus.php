<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TripStatus extends Model
{
    protected $primaryKey = 'status';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $appends = [
        'color',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    protected $fillable = [
        'creator_id',
        'status',
        'percent',
        'rgba'
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

    /**
     * Get trips that have this status.
     */
    public function trips()
    {
        // Some deployments may not have a `status` column on trips. Guard
        // against that to avoid SQL errors from views calling `$status->trips`.
        if (! Schema::hasColumn('trips', 'status')) {
            return $this->hasMany(Trip::class, 'id', 'id')->whereRaw('1=0');
        }

        return $this->hasMany(Trip::class, 'status', 'status');
    }

    /**
     * Backwards-compatible accessor for templates that expect `$status->name`.
     */
    public function getNameAttribute()
    {
        return $this->status;
    }
}
