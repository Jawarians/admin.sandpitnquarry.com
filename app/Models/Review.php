<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'approve',
        'content',
        'country_code',
        'created_at',
        'creator_id',
        'email',
        'name',
        'phone',
        'rating',
        'updated_at',
    ];
}
