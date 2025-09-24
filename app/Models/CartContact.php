<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartContact extends Model
{

    protected $fillable = [
        'country_code',
        'created_at',
        'creator_id',
        'name',
        'cart_id',
        'phone',
        'updated_at',
    ];

}
