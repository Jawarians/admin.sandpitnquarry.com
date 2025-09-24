<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransporterFeeDetail extends Model
{
    protected $casts = [
        'id' => 'integer',
        'charge' => MoneyCast::class,
        'creator_id' => 'integer',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'transporter_fee_id',
        'start',
        'duration',
        'charge',
        'creator_id',
    ];    

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function transporter_fee(): BelongsTo
    {
        return $this->belongsTo(TransporterFee::class);
    }
}
