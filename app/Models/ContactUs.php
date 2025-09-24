<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'content',
        'country_code',
        'created_at',
        'email',
        'id',
        'name',
        'phone',
        'subject',
        'updated_at',
    ];

    protected $table = 'contact_us';
}
