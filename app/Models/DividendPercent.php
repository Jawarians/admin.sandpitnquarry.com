<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DividendPercent extends Model
{
    protected $fillable = [
        'id',
        'percent',
        'start_at',
        'creator_id',
        'updated_at',
        'created_at',
    ];
}
