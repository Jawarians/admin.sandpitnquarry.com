<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppUser extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'phone_number',
        'creator_id'
    ];
}
