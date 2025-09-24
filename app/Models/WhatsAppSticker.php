<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppSticker extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'url',
        'mime_type',
    ];
}
