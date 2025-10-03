<?php

namespace App\Events;

use App\Models\Coin;
use App\Models\CoinRefund;
use App\Models\Order;
use App\Models\OrderAmount;
use App\Models\OrderDetail;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class OrderCancelled
{
    use Dispatchable, SerializesModels;

    public $order_id;
    public $user_id;
    public $coinable_type;
    public $cancel_quantity;
    public $hold_quantity;


    /**
     * Create a new event instance.
     */
    public function __construct($order_id, $user_id, $hold_quantity, $cancel_quantity)
    {
        $order = Order::orderEvent()
            ->find($order_id);

        $new_quantity = $order->latest->quantity - $cancel_quantity;
        $new_kg = ($order->oldest->total_kg / $order->oldest->quantity) * $new_quantity;
        if ($order->unit == 'Tonne'  && $order->address->id > 0) {
            $price = ($order->material_amount->amount + $order->transportation_amount->amount) / $order->oldest->quantity;
        } else {
            $price = ($order->material_amount->amount) / $order->oldest->quantity;
        }
        $total_refund =  $price * $cancel_quantity;

        Coin::create([
            'user_id' => $user_id,
            'amount' => $total_refund * 100,
            'coinable_id' => $order->id,
            'coinable_type' => 'order',
            'creator_id' => $user_id,
            'created_at' => $order->created_at,
            'updated_at' => Carbon::now()
        ]);
        $refund = CoinRefund::create([
            'coin_refundable_id' => $order->id,
            'coin_refundable_type' => 'order',
            'creator_id' => $user_id,
        ]);

        OrderAmount::create([
            'order_id' => $order->id,
            'order_amountable_id' => $refund->id,
            'order_amountable_type' => 'coin_refund',
            'amount' => $total_refund,
            'creator_id' => $user_id,
        ]);

        OrderDetail::create([
            'order_id' => $order->id,
            'site_id' => $order->latest->site_id,
            'status' => $order->latest->quantity == $cancel_quantity ? 'Cancelled' : 'Modified',
            'hold_quantity' => $hold_quantity,
            'cancel_quantity' => $cancel_quantity,
            'quantity' => $new_quantity,
            'total_kg' => $new_kg,
            'remark'  => $user_id > 0 ? 'Cancel by agent' : 'Cancel by admin',
            'available_at'  => $order->latest->available_at,
            'due_at'  => $order->latest->due_at,
            'creator_id' => $user_id,
            'created_at' => $order->latest->created_at,
            'updated_at' => Carbon::now()
        ]);
    }
}
