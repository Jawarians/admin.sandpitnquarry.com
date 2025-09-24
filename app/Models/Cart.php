<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'product_id',
        'unit',
        'remark',
        'cost_amount',
        'transportation_fee',
        'route_id',
        'quantity',
        'ordered_at',
        'wheel_id',
        'price_item_id',
        'address_id',
        'site_id',
        'user_id',
        'status',
        'creator_id',
        'updated_at',
        'created_at',
    ];

    
}
