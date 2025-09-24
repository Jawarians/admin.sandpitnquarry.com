<?php

namespace App\Models;

use App\Events\SendNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WithdrawalDetail extends Model
{
    protected static function booted(): void
    {
        static::created(function (WithdrawalDetail $withdrawal_detail) {
            if ($withdrawal_detail['status'] == 'Pending') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'token',
                    'title' => 'Your Token Withdrawal Request Is Pending Approval',
                    'description' => 'Your withdrawal request of ' . number_format($withdrawal_detail->withdrawal->coins) . ' SQ Tokens is currently pending approval. We will notify you once it has been processed.',
                    'receiver_id' => $withdrawal_detail->withdrawal->user->id,
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/pending.png',
                    'creator_id' => 0,
                    'cta_link' => 'withdrawal',
                    'cta_text' => 'View Status',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
            if ($withdrawal_detail['status'] == 'Approved') {
                Coin::create([
                    'user_id' => $withdrawal_detail->creator_id,
                    'amount' => $withdrawal_detail->withdrawal->coins * -100,
                    'coinable_id' => $withdrawal_detail->withdrawal->id,
                    'coinable_type' => 'withdrawal',
                    'creator_id' => $withdrawal_detail->withdrawal->user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $notification = CustomerNotification::create([
                    'notification_type' => 'token',
                    'title' => 'Your Token Withdrawal Request Has Been Approved!',
                    'description' => 'Your withdrawal request of ' . number_format($withdrawal_detail->withdrawal->coins) . ' SQ Tokens has been approved and the credits will be transferred to your bank account within 7 days.',
                    'receiver_id' => $withdrawal_detail->withdrawal->user->id,
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/bank_logo.png',
                    'creator_id' => 0,
                    'cta_link' => 'withdrawal',
                    'cta_text' => 'View Status',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
            if ($withdrawal_detail['status'] == 'Rejected') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'token',
                    'title' => 'Your Token Withdrawal Request Is Rejected',
                    'description' => 'Your withdrawal request of ' . number_format($withdrawal_detail->withdrawal->coins) . ' SQ Tokens has been rejected by the management. For further information, please contact our support team.',
                    'receiver_id' => $withdrawal_detail->withdrawal->user->id,
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/bank_logo_rejected.png',
                    'creator_id' => 0,
                    'cta_link' => 'withdrawal',
                    'cta_text' => 'View Status',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
        });

    }
    protected $fillable = [
        'creator_id',
        'created_at',
        'status',
        'updated_at',
        'withdrawal_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function withdrawal(): BelongsTo
    {
        return $this->belongsTo(Withdrawal::class);
    }
}
