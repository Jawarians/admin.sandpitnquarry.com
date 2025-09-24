<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Announcement extends Model
{
    protected $casts = [
        'user_id' => 'integer',
        'company_id' => 'integer',
        'customer_id' => 'integer',
        'announcementable_id' => 'integer',
        'red' => 'integer',
        'green' => 'integer',
        'blue' => 'integer',
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'company_id',
        'customer_id',
        'agent_id',
        'announcementable_id',
        'announcementable_type',
        'title',
        'subtitle',
        'status',
        'group',
        'rgba',
        'red',
        'green',
        'blue',
        'path',
        'read_at',
        'created_at',
        'updated_at',
        'creator_id'
    ];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'agent_id', 'id');
    }

    public function announcementable(): MorphTo
    {
        return $this->morphTo();
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }   

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }   

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
