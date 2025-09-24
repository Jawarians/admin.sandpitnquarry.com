<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressState extends Model
{
    protected $primaryKey = 'name';

    protected $keyType = 'string';

    public $incrementing = false;
}
