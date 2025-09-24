<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppVideo extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'caption',
        'url',
        'mime_type',
    ];
}
