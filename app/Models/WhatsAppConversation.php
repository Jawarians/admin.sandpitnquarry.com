<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhatsAppConversation extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'conversation_id',
    ];

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(WhatsAppMessage::class, 'conversation_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
