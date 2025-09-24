<?php

namespace App\Models;

use App\Events\RemindTokenNotification;
use App\Events\SendNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\DB;

class Coin extends Model
{
    protected static function booted(): void
    {

        static::creating(function (Coin $coin) {

            if (DB::table('morphs')->where('qualified_name', $coin['coinable_type'])->exists()) {
                $morph = DB::table('morphs')->where('qualified_name', $coin['coinable_type'])->first();
                $coin['coinable_type'] = $morph->type;
            }
            return true;
        });

        static::created(function (Coin $coin) {
            $token = DB::table('coins')
                ->where('user_id', $coin->user_id)
                ->sum('amount');
            if ($coin->coinable_type == 'reload') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'token',
                    'title' => 'SQ Tokens Successfully Reloaded!',
                    'description' => 'You have successfully reloaded ' . $coin->amount/100 . ' SQ Tokens to your account.',
                    'receiver_id' => $coin->user_id,
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/package_2.png',
                    'creator_id' => 0,
                    'cta_link' => 'reload',
                    'cta_text' => 'View History',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
            if (($token / 100) <= 1000) {
                $notification = CustomerNotification::create([
                    'notification_type' => 'token',
                    'title' => 'Reload Your SQ Tokens!',
                    'description' => 'You currently have ' . ($token/100) . ' SQ Tokens. Reload now for seamless purchasing experience.',
                    'receiver_id' => $coin->user_id,
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/package_2.png',
                    'creator_id' => 0,
                    'cta_link' => 'reload',
                    'cta_text' => 'Reload Now',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
        });
    }

    protected $casts = [
        'amount' => 'integer',
        'total' => 'integer',
        'date' => 'datetime',
        'created_at' => 'datetime',
        'creator_id' => 'integer',
        'id' => 'integer',
    ];

    protected $fillable = [
        'amount',
        'coinable_id',
        'coinable_type',
        'created_at',
        'creator_id',
        'id',
        'updated_at',
        'user_id',
    ];

    public function coinable(): MorphTo
    {
        return $this->morphTo();
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
