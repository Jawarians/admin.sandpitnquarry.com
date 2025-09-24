<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCustomer extends Model
{
    protected $table = 'users_customers';

    protected $primaryKey = 'user_uid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'user_uid' => 'string'
    ];

    protected $fillable = [
        'user_uid',
        'customer_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
