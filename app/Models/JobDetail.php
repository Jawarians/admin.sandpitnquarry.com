<?php

namespace App\Models;

use App\Events\JobAcceptedNotification;
use App\Events\SendNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobDetail extends Model
{
    protected $casts = [
        'id' => 'integer',
        'job_id' => 'integer',
        'quantity' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'job_id',
        'quantity',
        'status',
        'creator_id'
    ];

    protected $touches = ['job'];

    protected static function booted(): void
    {
        static::created(function (JobDetail $job_detail) {
            if ($job_detail->job->order->latest->today()->exists()) {
                $job_detail->job->order->latest->today->update([
                    'available' => $job_detail->job->order->latest->today->available - $job_detail->quantity
                ]);
            }
            if ($job_detail->status == 'Accepted') {

                $job_detail->job->order->latest->update([
                    'due_at' => Carbon::now()->addDays(2),
                    'end_at' => Carbon::now()->addDays(2),
                ]);
                // $orderDetail = OrderDetail::create([
                //     'order_id' => $job_detail->job->order,
                //     'site_id' =>  $job_detail->job->order->latest->site_id,
                //     'status' => 'Ongoing',
                //     'quantity' => $job_detail->job->order->latest->quantity - $job_detail->quantity ,
                //     'total_kg' => $job_detail->job->order->latest->totalKg,
                //     'remark' => $remark,
                //     'available_at' => Carbon::now(),
                //     'due_at' => Carbon::now()->addDays(2),
                //     'creator_id' => $_customer->id,
                //     'hold_quantity' => 0,
                //     'cancel_quantity' => 0,
                //     'total' => $quantity,
                //     'hold' => 0,
                //     'cancel' => 0,
                //     'start_at' => Carbon::now(),
                //     'end_at' => Carbon::now()->addDays(2),
                //     'action' => 'Created'
                // ]);

                // OrderDelegation::create([
                //     'available' => $quantity,
                //     'delegated' => $quantity,
                //     'order_detail_id' => $orderDetail->id,
                //     'start_at' => Carbon::now(),
                //     'end_at' => Carbon::now()->addDays(2),
                //     'creator_id' => $_customer->id,
                //     'status' => 'Ongoing',
                //     'total' => $quantity,
                // ]);


                $notification = CustomerNotification::create([
                    'notification_type' => 'order',
                    'title' => 'Order #' . $job_detail->job->order->id . ' Has Been Accepted',
                    'description' => 'Your order #' . $job_detail->job->order->id . ' has been accepted and is now being processed.',
                    'receiver_id' => $job_detail->job->order->user_id,
                    'read_status' => false,
                    'image_url' => $job_detail->job->order->product->featured_image->url,
                    'creator_id' => 0,
                    'cta_link' => $job_detail->job->order->id,
                    'cta_text' => 'View Order',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            } else if ($job_detail->status == 'Cancelled') {
                $tripCount = 0;
                $tripCount = DB::table('trips')
                    ->where('job_id', $job_detail->job->id)
                    ->where('status', '=', 'Completed')
                    ->count();






                Debit::create([
                    'transporter_id' => $job_detail->job->transporter->id,
                    'amount' => (50 * ($job_detail->job->oldest->quantity - $tripCount)) * -100,
                    'debitable_id' => $job_detail->job->id,
                    'debitable_type' => 'job',
                    'creator_id' =>   $job_detail->job->transporter->user_id,
                ]);

                DB::table('order_delegations')
                    ->where('order_detail_id', $job_detail->job->order->latest->id)
                    ->update(['updated_at' => now(), 'available' => $job_detail->job->order->available]);
            }
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }
}
