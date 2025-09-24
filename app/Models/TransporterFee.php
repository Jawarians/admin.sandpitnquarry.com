<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransporterFee extends Model
{
    protected $fillable = [
        'start_at',
        'creator_id',
    ];    

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function transporter_fee_details(): HasMany
    {
        return $this->hasMany(TransporterFeeDetail::class);
    }
}
