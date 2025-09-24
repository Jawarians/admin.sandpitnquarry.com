<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $fillable = [
        'user_id',
        'truck_id',
        'expired_at',
        'creator_id'
    ];
}
