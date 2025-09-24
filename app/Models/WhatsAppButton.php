<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppButton extends Model
{

    public $incrementing = false;

    protected $fillable = [
        'id',
        'payload',
        'text',
    ];
}
