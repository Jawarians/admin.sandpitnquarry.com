<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerNotification extends Model
{
    protected $fillable = [
        'notification_type',
        'title',
        'description',
        'receiver_id',
        'read_status',
        'image_url',
        'created_at',
        'updated_at',
        'cta_link',
        'cta_text',
        'creator_id',
    ];

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'receiver_id', 'id');
    }

}
