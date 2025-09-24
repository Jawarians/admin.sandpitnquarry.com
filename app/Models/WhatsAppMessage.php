<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WhatsAppMessage extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'from',
        'to',
        'type',
        'status',
        'sent',
        'delivered',
        'read',
        'whats_app_messageable_id',
        'whats_app_messageable_type',
    ];

    public function whats_app_messageable(): MorphTo
    {
        return $this->morphTo();
    }
}
