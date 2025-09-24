<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppText extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'body',
    ];
}
