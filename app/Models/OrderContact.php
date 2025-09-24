<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    protected $appends = ['phone_prefix', 'phone_suffix'];

    protected $fillable = [
        'country_code',
        'created_at',
        'creator_id',
        'name',
        'order_detail_id',
        'phone',
        'updated_at',
    ];

    public function getPhonePrefixAttribute()
    {
        if(substr($this->phone, 0, 3) == '601'){
            return substr($this->phone, 0, 4);
        }else{
            return substr($this->phone, 0, 3);
        }
    }

    public function getPhoneSuffixAttribute()
    {
        return substr($this->phone, 4);
    }
}
