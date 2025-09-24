<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BannedDrivers extends Model
{
    protected $fillable = [
        'id',
        'driver_id',
        'user_id',
        'creator_id',
        'banned_at',
        'created_at',
        'updated_at',
    ];

    protected static function booted(): void
    {
        static::created(function (BannedDrivers $bannedDrivers) {

            $allBannedDrivers = DB::table('banned_drivers')->where('driver_id', $bannedDrivers['driver_id'])->get();

            $length = count($allBannedDrivers);
            

            if ($length >= 3) {
               DriverDetail::create([
                   'driver_id' => $bannedDrivers['driver_id'],
                   'creator_id' => $bannedDrivers['creator_id'],
                   'status' => 'Banned',
                   'banned_at' => now(),
               ]);
            }

            return true;
        });
    }

}
