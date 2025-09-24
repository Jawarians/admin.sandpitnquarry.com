<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $primaryKey = 'type';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'type' => 'string',
    ];

    protected $fillable = [
        'creator_id',
        'type',
        'order'
    ];
}
