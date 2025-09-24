<?php

namespace App\Models;

use App\Traits\PushNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'data' => 'array',
        'id' => 'string',
        'notifiable_id' => 'string',
        'read_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'created_at',
        'content',
        'seen',
        'notifiable_id',
        'read_at',
        'title',
        'type',
        'path_id',
        'updated_at',
    ];

    use PushNotification;
    protected static function booted(): void
    {
        static::created(function (Notification $notification) {
            if ($notification->type == 'ScheduleReminder') {
                $delegations = DB::table('order_delegations as odel')
                    ->select([
                        'odel.id as delegation_id',
                        'odel.order_detail_id',
                        'odel.available',
                        'odel.delegated',
                        'odel.total',
                        'odel.start_at',
                        'odel.end_at',
                        'odel.status',
                        'od.order_id'
                    ])
                    ->join('order_details as od', 'odel.order_detail_id', '=', 'od.id')
                    ->join('orders as o', 'od.order_id', '=', 'o.id')
                    ->where('odel.status', 'Scheduled')
                    ->where('odel.id', $notification->path_id)
                    ->orderBy('odel.start_at', 'asc')
                    ->first();

                if ($delegations) {
                    $jobs = DB::table('jobs')
                        ->select('id', 'order_id', 'transporter_id', 'created_at')
                        ->where('order_id', $delegations->order_id)
                        ->orderBy('id', 'desc')
                        ->first();

                    if ($jobs) {

                        $transporters = DB::table('transporters')
                            ->select('id', 'name', 'user_id')
                            ->where('id', $jobs->transporter_id)
                            ->first();

                        if ($transporters) {

                            $user = DB::table('users')
                                ->select('id', 'name', 'email', 'fcm_token')
                                ->where('id', $transporters->user_id)
                                ->first();

                            if ($user) {
                                $deviceToken = $user->fcm_token;
                                $title = "Your Scheduled Order #" . $delegations->order_id;;
                                $body = "Hi there! Your order #" . $delegations->order_id . " is scheduled to start tomorrow. Please be ready to assign a driver for your delivery.";

                                $data = [
                                    'type' => 'ScheduleReminder',
                                    'tripId' => (string) $notification->path_id,
                                ];

                                PushNotification::sendNotification($deviceToken, $title, $body, $data);
                            }
                        }
                    }
                }
            }
        });
    }
}
