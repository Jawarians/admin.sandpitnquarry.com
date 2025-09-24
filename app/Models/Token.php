<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Token extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_at',
        'creator_id',
        'device',
        'tokenable_type',
        'tokenable_id',
        'token',
        'updated_at',
    ];

    protected static function booted(): void
    {
        static::creating(function (Token $token) {
            if (DB::table('morphs')->where('qualified_name', $token['tokenable_type'])->exists()) {
                $morph =  DB::table('morphs')->where('qualified_name', $token['tokenable_type'])->first();
                $token['tokenable_type'] = $morph->type;
            }
            if (empty($token['creator_id']) || !is_int($token['creator_id']) || $token['creator_id'] < 1) {
                $token['creator_id'] = $token['tokenable_id'];
            }

            return true;
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function tokenable(): MorphTo
    {
        return $this->morphTo();
    }
}
