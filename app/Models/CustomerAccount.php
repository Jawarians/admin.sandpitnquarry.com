<?php

namespace App\Models;

use App\Events\SendNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CustomerAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'bank',
        'user_id',
        'approved_at',
        'creator_id',
        'deleted_at',
        'updated_at',
        'created_at',
        'approver_id',
        'status',
    ];

    protected static function booted(): void
    {
        static::created(function (CustomerAccount $customerAccount) {
            $notification = CustomerNotification::create([
                'notification_type' => 'info',
                'title' => 'Your Bank Account Details Is Pending Approval',
                'description' => 'Your submitted bank account details are currently under review. You will be notified once they have been approved or if any further action is required.',
                'receiver_id' => $customerAccount['user_id'],
                'read_status' => false,
                'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/pending.png',
                'creator_id' => 0,
                'cta_link' => 'bank_detail',
                'cta_text' => 'View Details',
                'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
            ]);
            SendNotification::dispatch($notification);
        });

        static::updated(function (CustomerAccount $customerAccount) {

            if ($customerAccount['status'] == 'Pending') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'info',
                    'title' => 'Your Bank Account Details Is Pending Approval',
                    'description' => 'Your submitted bank account details are currently under review. You will be notified once they have been approved or if any further action is required.',
                    'receiver_id' => $customerAccount['user_id'],
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/pending.png',
                    'creator_id' => 0,
                    'cta_link' => 'bank_detail',
                    'cta_text' => 'View Details',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
            if ($customerAccount['status'] == 'Approved') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'info',
                    'title' => 'Your Bank Account Details Have Been Approved!',
                    'description' => 'Your submitted bank account details have been successfully verified and approved. You may now proceed with withdrawals or related actions.',
                    'receiver_id' => $customerAccount['user_id'],
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/bank_logo.png',
                    'creator_id' => 0,
                    'cta_link' => 'bank_detail',
                    'cta_text' => 'View Details',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
            if ($customerAccount['status'] == 'Reject') {
                $notification = CustomerNotification::create([
                    'notification_type' => 'info',
                    'title' => 'Your Bank Account Details Have Been Rejected',
                    'description' => 'Unfortunately, your bank account details did not pass our verification process. Please review and resubmit the correct information.',
                    'receiver_id' => $customerAccount['user_id'],
                    'read_status' => false,
                    'image_url' => 'https://storage.googleapis.com/snq-website-images/customer/bank_logo_rejected.png',
                    'creator_id' => 0,
                    'cta_link' => 'bank_detail',
                    'cta_text' => 'View Details',
                    'created_at' => Carbon::now('Asia/Kuala_Lumpur'),
                    'updated_at' => Carbon::now('Asia/Kuala_Lumpur'),
                ]);
                SendNotification::dispatch($notification);
            }
        });
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function document(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable');
    }
}
