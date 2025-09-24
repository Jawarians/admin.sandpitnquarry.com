<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessPriceStatus extends Model
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
}
