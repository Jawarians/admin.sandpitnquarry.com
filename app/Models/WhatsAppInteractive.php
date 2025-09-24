<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppInteractive extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'type',
        'title',
        'description',
    ];
}
