<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class BusinessPrice extends Model
{
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(
                [
                    'table' => 'business_prices',
                    'length' => 10,
                    'prefix' => date('ymd'),
                    'reset_on_prefix_change' => true,
                ]
            );
        });
    }

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $appends = [
        'order_details',
    ];

    protected $casts = [
        'id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
        'user_id' => 'integer',
    ];

    protected $fillable = [
        'address_id',
        'created_at',
        'creator_id',
        'user_id',
    ];

    public function getOrderDetailsAttribute()
    {
        $latest_order_details = DB::table('order_details')
            ->select('order_details.order_id', DB::raw('MAX(id) as latest_order_detail_id'))
            ->groupBy('order_details.order_id');

        return  DB::table('business_prices')
            ->where('business_prices.id', $this->id)
            ->join('business_price_details', 'business_prices.id', '=', 'business_price_details.business_price_id')
            ->join('business_price_items', 'business_price_details.id', '=', 'business_price_items.business_price_detail_id')
            ->join('business_price_item_details', 'business_price_items.id', '=', 'business_price_item_details.business_price_item_id')
            ->join('business_price_orders', 'business_price_items.id', '=', 'business_price_orders.business_price_item_id')
            ->join('orders', 'business_price_orders.id', '=', 'orders.id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->joinSub($latest_order_details, 'latest_order_details', function (JoinClause $join) {
                $join->on('order_details.id', '=', 'latest_order_details.latest_order_detail_id');
            })
            ->get()
            ->groupBy('product_id')
            ->map(function ($item, int $key) {
                return array(
                    'product_id' => $key,
                    'quantity' => $item->sum('quantity'),
                    'total_kg' => $item->sum('total_kg'),
                    'total_tonne' => $item->sum('total_kg') / 1000,
                );
            })
            ->values();
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function business_price_details(): HasMany
    {
        return $this->hasMany(BusinessPriceDetail::class);
    }

    public function business_price_purchases(): HasMany
    {
        return $this->hasMany(BusinessPricePurchase::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function destination_address(): BelongsTo
    {
        return $this->belongsTo(DestinationAddress::class, 'address_id', 'id');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(BusinessPriceDetail::class)->latestOfMany();
    }

    public function oldest(): HasOne
    {
        return $this->hasOne(BusinessPriceDetail::class)->oldestOfMany();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
