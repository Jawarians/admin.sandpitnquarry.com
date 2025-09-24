<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverDetail extends Model
{
    protected static function booted(): void
    {
        static::created(function (DriverDetail $driver_detail) {
            $auth = app('firebase.auth');

            if ($driver_detail['status'] == 'Deleted') {
                $uid =  $driver_detail->driver->user_id;
                try {
                    $uid =  $driver_detail->driver->user_id;
                    $user = $auth->getUser($uid);
                    if ($user != null) {
                        $auth->deleteUser($uid);
                    }
                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                }
            }
        });
    }

    protected $fillable = [
        'driver_id',
        'status',
        'creator_id',
    ];

    protected $touches = ['driver'];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
