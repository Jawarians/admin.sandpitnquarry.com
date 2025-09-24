<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroHeader extends Model
{
    protected $fillable = [
        'created_at',
        'creator_id',
        'cta',
        'end_at',
        'image',
        'link',
        'start_at',
        'subtitle',
        'title',
        'updated_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }
}
