<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RouteDetail extends Model
{
    protected $fillable = [
        'address_id',
        'created_at',
        'creator_id',
        'purchase_id',
        'route_id',
        'site_id',
        'updated_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
