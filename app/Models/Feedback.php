<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'content',
        'country_code',
        'created_at',
        'email',
        'phone',
        'updated_at',
    ];

    protected $table = 'feedbacks';
}
