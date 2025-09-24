<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TripTerminationReason extends Model
{
    public function trip_reason(): MorphOne
    {
        return $this->morphOne(TripReason::class, 'trip_reasonable');
    }
}
