<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class BillplzBill extends Model
{
    use Sushi;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
    ];

    public function getRows()
    {
        if (env('BILLPLZ_SANDBOX') == "true") {
            $billplz = 'https://www.billplz-sandbox.com/api/';
        } else {
            $billplz = 'https://www.billplz.com/api/';
        }

       return [
            [
                'id' => 'NY',
                'name' => 'New York',
            ],
            [
                'id' => 'CA',
                'name' => 'California',
            ],
        ];
    }
}
