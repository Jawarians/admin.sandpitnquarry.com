<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClaimDetail extends Model
{
    protected $fillable = [
        'claim_id',
        'created_at',
        'creator_id',
        'id',
        'status',
        'updated_at',
    ];

    protected static function booted(): void
    {
        static::created(function (ClaimDetail $claim_detail) {
            if ($claim_detail->status == 'Approved') {

                Debit::create([
                    'transporter_id' => $claim_detail->claim->customer_account->customer->transporter->id,
                    'amount' => round($claim_detail->claim->amount * -1),
                    'debitable_id' => $claim_detail->claim->id,
                    'debitable_type' => 'claim',
                    'creator_id' =>   $claim_detail->claim->customer_account->customer->transporter->user_id,
                ]);
            }
        });
    }

    public function claim(): BelongsTo
    {
        return $this->belongsTo(Claim::class);
    }
}
