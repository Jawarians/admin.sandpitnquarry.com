<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{

    protected $primaryKey = 'role';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'created_at',
        'creator_id',
        'role',
        'rgba',
        'updated_at',
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role',  'permission');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role',  'user_id');
    }
}
