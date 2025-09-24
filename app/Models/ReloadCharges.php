<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReloadCharges extends Model
{
    protected $fillable = ['percentage', 'creator_id'];
    public static function getPercentage()
    {
        return self::first()->percentage ?? 1.50;
    }
}