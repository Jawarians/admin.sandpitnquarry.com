<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppPhoneNumber extends Model
{
    protected $primaryKey = 'phone_number';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'phone_number',
    ];
}
