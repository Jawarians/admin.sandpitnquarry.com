<?php

namespace App\Models;


use App\Mail\ChangePincode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Code extends Model
{
    protected $fillable = [
        'verify',
        'used',
        'code',
        'creator_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'code' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Code $code) {

            $code['code']  = mt_rand(100000, 999999);
            $code['used']  = false;
            $code['verify']  = false;
            return true;
        });

        static::created(function (Code $code) {

            Mail::to($code->customer->email)
                ->send(new ChangePincode($code['code']));

            return true;
        });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
