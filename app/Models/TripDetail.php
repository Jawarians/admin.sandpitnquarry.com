<?php

namespace App\Models;

require_once "../vendor/autoload.php";

use App\Events\SendNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
use App\Traits\PushNotification;

class TripDetail extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'trip_id' => 'integer',
        'latitude' => 'double',
        'longitude' => 'double',
        'reason' => 'string',
        'status' => 'string',
        'device' => 'string',
        'version' => 'string',
        'ip_address' => 'string',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'assignment_id',
        'creator_id',
        'created_at',
        'device',
        'ip_address',
        'status',
        'trip_id',
        'latitude',
        'longitude',
        'reason',
        'delivery_proof',
        'version',
        'updated_at',
    ];

    use PushNotification;
    protected static function booted(): void
    {
        static::created(function (TripDetail $trip_detail) {
            // Load necessary relationships before accessing them
            $trip_detail->load('trip.job.order.user', 'trip.job.order.product.featured_image', 'assignment.truck');

            $material_amount = $trip_detail->trip->job->order->material_amount->amount;

            $transportation_amount = $trip_detail->trip->job->order->unit == 'Load' ? 0 :  $trip_detail->trip->job->order->transportation_amount->amount;

            $per_tonnage_amount = ($material_amount + $transportation_amount) / $trip_detail->trip->job->order->oldest->total_kg;

            $total_tonnage_amount = $per_tonnage_amount * $trip_detail->trip->actual_quantity;


            $quantity = $trip_detail->trip->expected_quantity > $trip_detail->trip->actual_quantity ? $trip_detail->trip->actual_quantity / $trip_detail->trip->expected_quantity : 1;
            $total_price = $trip_detail->trip->job->order->unit == 'Load' ? $trip_detail->trip->job->order->cost_amount : $total_tonnage_amount;
            if ($trip_detail->trip->status == 'Completed') {
                $latestDeliveryNumber = DB::table('trip_details')
                    ->whereNotNull('delivery_order')
                    ->orderBy('id', 'desc')
                    ->value('delivery_order');

                $nextDeliveryNumber = str_pad(
                    (int)($latestDeliveryNumber ?? 0) + 1,
                    6,
                    '0',
                    STR_PAD_LEFT
                );

                // Update the trip_detail (or create if you're inserting new record)
                DB::table('trip_details')
                    ->where('trip_id', $trip_detail->trip->id) // or whatever uniquely identifies the row
                    ->update([
                        'delivery_order' => $nextDeliveryNumber,
                        'updated_at' => now(),
                    ]);

                $per_tonnage =  $trip_detail->trip->actual_quantity;
                $per_total_kg = $trip_detail->trip->job->order->oldest->total_kg;
                


                if ($trip_detail->trip->job->order->unit == 'Tonne') {
                    if ($per_tonnage / 1000 < $trip_detail->trip->job->order->wheel->capacity) {
                        $balance_tonne = $trip_detail->trip->job->order->wheel->capacity * 1000 - $per_tonnage;

                        $total_amount = $transportation_amount + $material_amount;

                        $per_transportation = $total_amount / $per_total_kg;
                        $refund_amount = $balance_tonne * $per_transportation;

                        $tonne_refund = TonneRefund::create([
                            'trip_id' => $trip_detail->trip->id,
                            'job_id' => $trip_detail->trip->job->id,
                            'order_id' => $trip_detail->trip->job->order->id,
                            'balance_tonne' => $balance_tonne,
                            'transporter_id' =>  $trip_detail->trip->job->transporter->id,
                            'amount' => round($refund_amount * 100),
                            'creator_id' => 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                            'updated_at' => now(),
                        ]);

                        Coin::create([
                            'user_id' => $trip_detail->trip->job->order->user_id,
                            'amount' => round($refund_amount * 100),
                            'coinable_id' => $tonne_refund->id,
                            'coinable_type' => 'tonne_refund',
                            'creator_id' => 0,
                        ]);
                    }
                }

                $jobQuantity = $trip_detail->trip->job->latest->quantity;

                $trips_completed = DB::table('trips')
                    ->where('status', '=', 'Completed')
                    ->where('job_id', '=', $trip_detail->trip->job->id)
                    ->orderBy('id', 'asc')
                    ->get();

                if ($jobQuantity == count($trips_completed)) {
                    DB::table('jobs')
                        ->where('id', $trip_detail->trip->job->id)
                        ->update(['updated_at' => now()]);

                    $job_details = JobDetail::create([
                        'job_id' => $trip_detail->trip->job->id,
                        'quantity' => 0,
                        'status' => 'Complete',
                        'creator_id' => $trip_detail->trip->job->transporter->user_id,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]);
                }



                // $packages = DB::table('packages')
                //     ->where('id', $trip_detail->assignment->truck->package_id)
                //     ->orderBy('created_at', 'desc')
                //     ->first();



                // if ($trip_detail->assignment->truck->package->name == 'Bronze') {


                //     $service_charge = ServiceCharge::create([
                //         'trip_id' => $trip_detail->trip->id,
                //         'charge' => $trip_detail->trip->job->order->unit == 'Load'
                //             ? round(($trip_detail->trip->job->order->cost_amount * $trip_detail->assignment->truck->package->service_charge) * 100)
                //             : round((((($trip_detail->trip->job->order->transportation_amount->amount /  $per_total_kg) * $per_tonnage) * 100) * $trip_detail->assignment->truck->package->service_charge) * 1),
                //         // : round(((($trip_detail->trip->job->order->transportation_amount->amount / $per_total_kg) * $per_tonnage) * $trip_detail->assignment->truck->package->service_charge) * 1),
                //         'transporter_id' => $trip_detail->trip->job->transporter->id,
                //         'creator_id' =>   $trip_detail->trip->job->transporter->user_id,
                //     ]);

                //     // Log::debuf($trip_detail->trip->job->order->transportation_amount->amount);

                //     Debit::create([
                //         'transporter_id' => $trip_detail->trip->job->transporter->id,
                //         'amount' => $trip_detail->trip->job->order->unit == 'Load'
                //             ? round(($trip_detail->trip->job->order->cost_amount * $trip_detail->assignment->truck->package->service_charge) * -100)
                //             : round((((($trip_detail->trip->job->order->transportation_amount->amount /  $per_total_kg) * $per_tonnage) * 100) * $trip_detail->assignment->truck->package->service_charge) * -1),
                //         // : round(((($trip_detail->trip->job->order->transportation_amount->amount /  $per_total_kg) * $per_tonnage) * $trip_detail->assignment->truck->package->service_charge) * -1),
                //         'debitable_id' => $service_charge->id,
                //         'debitable_type' => 'service_charge',
                //         'creator_id' =>   $trip_detail->trip->job->transporter->user_id,
                //     ]);
                // }


                Debit::create([
                    'transporter_id' => $trip_detail->trip->job->transporter->id,
                    'amount' => $trip_detail->trip->job->order->unit == 'Load'
                        ? round($trip_detail->trip->job->order->cost_amount * 100)
                        : round((($trip_detail->trip->job->order->transportation_amount->amount /  $per_total_kg) * $per_tonnage) * 100),
                    'debitable_id' => $trip_detail->trip->id,
                    'debitable_type' => 'trip',
                    'creator_id' =>   $trip_detail->trip->job->transporter->user_id,
                ]);

                $deviceToken =  $trip_detail->trip->job->transporter->customer->fcm_token;
                $title = "Trip #" . $trip_detail->trip->id . " Has Been Completed";
                $body = "Trip #{$trip_detail->trip->id} payout is ready! Check your earnings and grab your next order";

                $data = [
                    'type' => 'Trip',
                    'tripId' => (string) $trip_detail->trip->id,
                ];

                PushNotification::sendNotification($deviceToken, $title, $body, $data);

                Notification::create([
                    'notifiable_id' => $trip_detail->trip->job->transporter->user_id,
                    'title' => $title,
                    'type' => 'Completed',
                    'path_id' => $trip_detail->trip->id,
                    'content' => 'Your assigned trip #' . $trip_detail->trip->id  . 'is now completed. Great job!',
                    'seen' => false,
                    'read_at' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                Notification::create([
                    'notifiable_id' => $trip_detail->trip->job->transporter->user_id,
                    'title' => "Amount Credited for Trip #" . $trip_detail->trip->id,
                    'type' => 'Credited',
                    'content' => $body,
                    'path_id' => null,
                    'seen' => false,
                    'read_at' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $job = Job::where('order_id', $trip_detail->trip->job->order->id)
                    ->orderByDesc('id')
                    ->get();

                $trip_completed = 0;

                for ($i = 0; $i < count($job); $i++) {
                    $trip = Trip::where('job_id',  $job[$i]['id'])
                        ->get();

                    // $trip_details = TripDetail::where('trip_id', $trip->id)
                    //     ->where('status', 'Completed')
                    //     ->get();

                    $trip_completed += count($trip);
                }


                $order_details = OrderDetail::where('order_id', $trip_detail->trip->job->order->id)
                    ->orderByDesc('id')
                    ->first();

                if ($trip_completed  == $order_details['total']) {
                    $order = DB::table('orders')
                        ->where('id', $trip_detail->trip->job->order->id)
                        ->update(['updated_at' => now(), 'status' => 'Completed']);
                }

                // if ($trip_completed  == $trip_detail->trip->job->latest->quantity) {
                // $job = DB::table('jobs')
                //     ->where('id', $trip_detail->trip->job->id)
                //     ->update(['updated_at' => now()]);

                // $job_details = JobDetail::create([
                //     'job_id' => $trip_detail->trip->job->id,
                //     'quantity' => 0,
                //     'status' => 'Completed',
                //     'creator_id' => $trip_detail->assignment->transporter_id,
                //     'updated_at' => now(),
                //     'created_at' => now(),
                // ]);
                // }

                $order = $trip_detail->trip->job->order;
                // if ($order) {
                //     $notification = CustomerNotification::create([
                //         'notification_type' => 'order',
                //         'title' => 'Order #' . $order->id . ' Is Completed',
                //         'description' => 'Your order #' . $order->id . ' has been delivered on ' . Carbon::now('Asia/Kuala_Lumpur')->format('F j, Y \a\t g:i A') . '. Thank you for purchasing with us!',
                //         'receiver_id' => $order->user_id,
                //         'read_status' => false,
                //         'image_url' => $order->product && $order->product->featured_image ? $order->product->featured_image->url : null,
                //         'creator_id' => 0,
                //         'cta_link' => $order->id,
                //         'cta_text' => 'View Order',
                //         'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                //         'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                //     ]);
                //     SendNotification::dispatch($notification);
                // }


                if ($trip_detail->trip->job->order->user->referrer_id > 0) {
                    $customer_referrer_percent = CustomerReferrerPercent::where('start_at', '<', now())
                        ->orderByDesc('start_at')
                        ->first();

                    $customer_referrer = CustomerReferrer::create([
                        'user_id' => $trip_detail->trip->job->order->user->referrer->id,
                        'customer_referrer_percent_id' => $customer_referrer_percent->id,
                        'percent' => $customer_referrer_percent->percent,
                        'creator_id' => $trip_detail->creator_id,
                    ]);
                    Point::create([
                        'user_id' => $trip_detail->trip->job->order->user->referrer->referrer_id,
                        'quantity' => floor($quantity * intdiv($total_price, 100) * $customer_referrer_percent->percent),
                        'pointable_id' => $customer_referrer->id,
                        'pointable_type' => 'customer_referrer',
                        'creator_id' => $trip_detail->creator_id,
                    ]);

                    $point_percent = PointPercent::where('start_at', '<', now())
                        ->orderByDesc('start_at')
                        ->first();

                    Point::create([
                        'user_id' => $trip_detail->trip->job->order->user_id,
                        'quantity' => floor($quantity * intdiv($total_price, 100) * $point_percent->percent),
                        'pointable_id' => $trip_detail->trip->id,
                        'pointable_type' => 'trip',
                        'creator_id' => $trip_detail->creator_id,
                    ]);
                } else {
                    $point_percent = PointPercent::where('start_at', '<', now())
                        ->orderByDesc('start_at')
                        ->first();

                    Point::create([
                        'user_id' => $trip_detail->trip->job->order->user_id,
                        'quantity' => floor($quantity * intdiv($total_price, 100) * $point_percent->percent),
                        'pointable_id' => $trip_detail->trip->id,
                        'pointable_type' => 'trip',
                        'creator_id' => $trip_detail->creator_id,
                    ]);
                }
            }

            if ($trip_detail->status == 'Nearby') {
                $job = DB::table('jobs')
                    ->where('id', $trip_detail->trip->job->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $order = DB::table('orders')
                    ->where('id', $job->order_id)
                    ->orderBy('id', 'desc')
                    ->first();

                $oldest_order = DB::table('order_details')
                    ->where('order_id', $order->id)
                    ->orderBy('id', 'asc')
                    ->first();

                $contacts = DB::table('order_contacts')
                    ->where('order_detail_id', $oldest_order->id)
                    ->whereNotNull('name')
                    ->orderBy('id', 'asc')
                    ->get();


                $customer = DB::table('users')
                    ->where('id', $order->user_id)
                    ->first();

                $driver = DB::table('drivers')
                    ->where('id', $trip_detail->trip->driver->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $user_driver = DB::table('users')
                    ->where('id', $driver->user_id)
                    ->orderBy('id', 'desc')
                    ->first();

                $deviceToken = $user_driver->fcm_token;
                $title = "You're Almost There!";
                $body = "You are approximately 10–15 minutes away from the delivery destination. Please stay on course and prepare for arrival.";

                $data = [
                    'type' => 'Trip',
                    'tripId' => (string) $trip_detail->trip->id,
                ];

                PushNotification::sendNotification($deviceToken, $title, $body, $data);

                Notification::create([
                    'notifiable_id' =>  $driver->user_id,
                    'title' => $title,
                    'type' => 'Nearby',
                    'path_id' => $trip_detail->trip->id,
                    'content' => $body,
                    'seen' => false,
                    'read_at' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $sid = env("TWILIO_ACCOUNT_SID");
                $token = env("TWILIO_AUTH_TOKEN");

                $twilio = new Client($sid, $token);

                $message = $twilio->messages
                    ->create(
                        "whatsapp:+" . $customer->phone,
                        array(
                            "from" => "whatsapp:+15557807454",
                            "contentSid" => "HXfdae49537fc82e00b5ed4aecdfaa2f0e",
                            "contentVariables" => json_encode([
                                "orderId" => (string) $order->id,
                                "productName" => (string) $trip_detail->trip->job->order->product->name,
                            ]),
                        )
                    );

                for ($i = 0; $i < count($contacts); $i++) {
                    $twilio->messages
                        ->create(
                            "whatsapp:+" . $contacts[$i]->phone,
                            array(
                                "from" => "whatsapp:+15557807454",
                                "contentSid" => "HXfdae49537fc82e00b5ed4aecdfaa2f0e",
                                "contentVariables" => json_encode([
                                    "orderId" => (string) $order->id,
                                    "productName" => (string) $trip_detail->trip->job->order->product->name,
                                ]),
                            )
                        );
                }
            }

            if ($trip_detail->status == 'Assigned') {
                $order = $trip_detail->trip->job->order;
                $assignment = $trip_detail->assignment;
                if ($order) {
                    $notification = CustomerNotification::create([
                        'notification_type' => 'order',
                        'title' => 'Order #' . $order->id . ' Has Been Assigned To Deliver',
                        'description' => 'Your order #' . $order->id . ' has been successfully assigned and will be delivered within 24 hours. Truck Number: ' . ($assignment && $assignment->truck ? $assignment->truck->registration_plate_number : 'N/A'),
                        'receiver_id' => $order->user_id,
                        'read_status' => false,
                        'image_url' => $order->product && $order->product->featured_image ? $order->product->featured_image->url : null,
                        'creator_id' => 0,
                        'cta_text' => 'View Order',
                        'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                        'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    ]);
                    SendNotification::dispatch($notification);
                }
            }
        });
    }

    protected $touches = ['trip'];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function trip_status(): BelongsTo
    {
        return $this->belongsTo(TripStatus::class, 'status', 'status');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function delivery_order(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable')->latestOfMany();
    }

    public function customer_signature(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable')->latestOfMany();
    }
}
