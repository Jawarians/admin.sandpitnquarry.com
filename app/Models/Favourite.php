<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favourites';
    
    protected $fillable = [
        'creator_id',
        'created_at',
        'product_id',
        'updated_at',
        'user_id',
    ];

}
