<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pin extends Model
{
    protected $fillable = [
        'creator_id',
        'created_at',
        'id',
        'pin',
        'updated_at',
    ];

    protected $hidden = ['pin'];

    protected static function booted(): void
    {
        static::creating(function (Pin $pin) {
            $pin['pin']  =
                Hash::make($pin['pin']);
            return true;
        });

        static::updating(function (Pin $pin) {
            $pin['pin']  =
                Hash::make($pin['pin']);
            return true;
        });
    }
}
