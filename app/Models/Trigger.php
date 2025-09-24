<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{   
    protected $primaryKey = 'trigger';

    protected $keyType = 'string';

    public $incrementing = false;
}
