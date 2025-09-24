<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RetailPrice extends Model
{
    protected $casts = [
        'created_at' => 'datetime',
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'postcode',
        'product_id',
        'price',
        'published_at',
        'site_id',
        'wheel_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function postcode(): BelongsTo
    {
        return $this->belongsTo(Postcode::class, 'postcode', 'postcode');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function wheel(): BelongsTo
    {
        return $this->belongsTo(Wheel::class, 'wheel_id', 'wheel');
    }
}
