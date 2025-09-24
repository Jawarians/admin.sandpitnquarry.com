<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $primaryKey = 'permission';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function booted(): void
    {
        static::updating(function (Permission $permission) {
            if ($permission['state']) {
                DB::table('role_permissions')->insert([
                    'role' => $permission['role'],
                    'permission' => $permission['permission'],
                    'creator_id' => $permission['creator_id'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
            } else {
                DB::table('role_permissions')->where('role', $permission['role'])->where('permission', $permission['permission'])->delete();
            }

            unset($permission[$permission['role']]);
            unset($permission['state']);
            unset($permission['role']);
        });
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission', 'role');
    }

    public function triggers(): BelongsToMany
    {
        return $this->belongsToMany(Trigger::class, 'announcement_triggers', 'permission', 'trigger');
    }
}
