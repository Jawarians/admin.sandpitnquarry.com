<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderAmount extends Model
{
    protected $casts = [
        'id' => 'integer',
        'amount' => MoneyCast::class,
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'amount',
        'created_at',
        'creator_id',
        'order_amountable_id',
        /// Material (business_price_item_details table) / Transportation (traffics table) / Refund (transactions table)
        'order_amountable_type',
        'order_id',
        'updated_at',
    ];

    // protected static function booted(): void
    // {
        // static::creating(function (OrderAmount $order_amount) {
        //     if ($order_amount['order_amountable_type'] == 'transportation' && !empty($order_amount['transportation_fee'])) {

        //         $route =  Route::create([
        //             'departure_at' => now(),
        //             'origin_latitude' => $order_amount['transportation_fee']['site']['latitude'],
        //             'origin_longitude' => $order_amount['transportation_fee']['site']['longitude'],
        //             'origin_addresss' => $order_amount['transportation_fee']['site']['name'],
        //             'destination_latitude' =>
        //             $order_amount['transportation_fee']['address']['latest']['latitude'],
        //             'destination_longitude' =>
        //             $order_amount['transportation_fee']['address']['latest']['longitude'],
        //             'destination_addresss' =>
        //             $order_amount['transportation_fee']['address']['latest']['address_1'],
        //             'distance_text' => $order_amount['transportation_fee']['site']['distance_text'],
        //             'distance_value' => $order_amount['transportation_fee']['site']['distance_value'],
        //             'duration_text' => $order_amount['transportation_fee']['site']['duration_text'],
        //             'duration_value' => $order_amount['transportation_fee']['site']['duration_value'],
        //             'traffic_text' => $order_amount['transportation_fee']['site']['traffic_text'],
        //             'traffic_value' => $order_amount['transportation_fee']['site']['traffic_value'],
        //             'creator_id' => $order_amount['creator_id'],
        //         ]);

        //         $transporter_fee = TransporterFee::where('start_at', '<', now())
        //             ->with(['transporter_fee_details' => function ($query) use ($order_amount) {
        //                 $query->where('start', '<', $order_amount['transportation_fee']['site']['traffic_value']);
        //                 $query->orderBy('start', 'desc');
        //             }])
        //             ->orderBy('start_at')
        //             ->first();

        //         $transportation_fee =  TransportationFee::create([
        //             'transporter_fee_id' => $transporter_fee->id,
        //             'route_id' => $route->id,
        //             'creator_id' =>
        //             $order_amount['creator_id'],
        //         ]);

        //         $order_amount['order_amountable_id'] = $transportation_fee->id;

        //         unset($order_amount['transportation_fee']);
        //     }
        // });

        // static::creating(
        //     function (OrderAmount $order_amount) {

        //         if ($order_amount->order_amountable_type == 'transportation') {
        //             $transportation_fee = TransportationFee::find($order_amount->order_amountable_id);

        //             RouteDetail::create([
        //                 'purchase_id' => $order_amount->order->purchase_id,
        //                 'route_id' => $transportation_fee->route_id,
        //                 'site_id' => $order_amount->order->latest->site_id,
        //                 'address_id' =>
        //                 $order_amount->order->address_id,
        //                 'creator_id' => $order_amount->creator_id,
        //             ]);
        //         }
        //     }
        // );
    // }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function order_amountable(): MorphTo
    {
        // Simple implementation that relies on the global morph map
        return $this->morphTo();
    }
}
