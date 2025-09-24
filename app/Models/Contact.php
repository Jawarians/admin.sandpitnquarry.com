<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $appends = ['phone_prefix', 'phone_suffix'];

    protected $fillable = [
        'address_detail_id',
        'name',
        'phone',
        'fax',
        'type',
        'creator_id'
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
