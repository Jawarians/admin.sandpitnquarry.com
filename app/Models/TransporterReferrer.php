<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransporterReferrer extends Model
{

    protected $fillable = [
        'user_id',
        'transporter_referrer_percent_id',
        'percent',
        'quantity',
        'creator_id'
    ];
}