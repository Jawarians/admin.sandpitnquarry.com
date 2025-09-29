<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class OrderStatus extends Model
{
    protected $primaryKey = 'status';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $appends = [
        'color',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    protected $fillable = [
        'rgba',
        'status',
    ];

    public function getColorAttribute()
    {
        $rgba = substr($this->rgba, 5, -1);
        $color = explode(',', $rgba);
        return array(
            'red' => (int) trim($color[0]),
            'green' => (int) trim($color[1]),
            'blue' => (int) trim($color[2]),
            'alpha' => (float) trim($color[3]),
        );
    }

    public function orders()
    {
        // Guard for environments where `orders.status` column is missing.
        if (! Schema::hasColumn('orders', 'status')) {
            return $this->hasMany(Order::class, 'id', 'id')->whereRaw('1=0');
        }

        return $this->hasMany(Order::class, 'status', 'status');
    }

    /**
     * Backwards-compatible accessor for templates that expect `$status->name`.
     */
    public function getNameAttribute()
    {
        return $this->status;
    }
}