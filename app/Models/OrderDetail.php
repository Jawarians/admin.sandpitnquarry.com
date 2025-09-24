<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderDetail extends Model
{
    protected $appends = [
        'hold',
        'total_tonne',
    ];

    protected $fillable = [
        'action',
        'available_at',
        'cancel',
        'cancel_quantity',
        'created_at',
        'creator_id',
        'due_at',
        'end_at',
        'hold_quantity',
        'order_id',
        'quantity',
        'remark',
        'site_id',
        'start_at',
        'status',
        'total',
        'total_kg',
        'updated_at',
    ];

    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $touches = ['order'];

    // protected static function booted(): void
    // {
    //     static::created(function (OrderDetail $order_detail) {

    //         if ($order_detail->cancel > 0) {

    //             // $new_kg = ($order_detail->order->oldest->total_kg / $order_detail->order->oldest->total) * $order_detail->total;
                
    //         }
    //     });
    // }

    public function getHoldAttribute()
    {
        $order = Order::where('id', $this->order_id)
            ->withSum('order_details', 'cancel')
            ->with([
                'latest' => function ($query) {
                    $query->withSum('order_delegations', 'total');
                },
                'oldest',
            ])
            ->first();
        // Check if relationships are loaded to avoid errors.
        if (!$order || !$order->latest || !$order->oldest) {
            return 0; // Or handle the case where data is missing appropriately.
        }

        return $order->oldest->total - $order->order_details_sum_cancel - $order->latest->order_delegations_sum_total;
    }

    public function getTotalTonneAttribute()
    {
        return $this->total_kg > 0 ? ($this->total_kg) / 1000 : 0;
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function order_contacts(): HasMany
    {
        return $this->hasMany(OrderContact::class);
    }

    public function order_delegations(): HasMany
    {
        return $this->hasMany(OrderDelegation::class);
    }

    public function order_status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'status');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function today(): HasOne
    {
        $now = Carbon::now('Asia/Kuala_Lumpur');
        $today =  Carbon::today('Asia/Kuala_Lumpur')->addHours(17);
        $tomorrow =  Carbon::tomorrow('Asia/Kuala_Lumpur')->addHours(17);

        return $this->hasOne(OrderDelegation::class)->ofMany([
            'id' => 'max',
        ], function (Builder $query) use ($now, $today, $tomorrow) {
            $query->where('start_at', '<', $now->greaterThan($today) ? $tomorrow->format('Y-m-d H:i:s') : $today->format('Y-m-d H:i:s'));
            $query->where('end_at', '>', $now->format('Y-m-d H:i:s'));
        });
    }
}
