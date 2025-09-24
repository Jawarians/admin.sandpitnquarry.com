<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransportationFee extends Model
{
    protected $fillable = [
        'transporter_fee_id',
        'route_id',
        'creator_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function transporter_fee(): BelongsTo
    {
        return $this->belongsTo(TransporterFee::class);
    }
   
}
