<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class BillplzCollection extends Model
{
    use Sushi;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
    ];

    protected $schema = [
        'id' => 'string',
        'title' => 'string',
    ];

    public function getRows()
    {
        if (env('BILLPLZ_SANDBOX') == "true") {
            $billplz = 'https://www.billplz-sandbox.com/api/';
        } else {
            $billplz = 'https://www.billplz.com/api/';
        }

        $response = Http::asForm()
        ->withBasicAuth(env('BILLPLZ_API_KEY'), '')
        ->get(
            $billplz . 'v4/collections',
        );

    if (!$response->successful()) {
        throw new \Exception('Payment gateway error');
    } else {

        $result = $response->json();
        $collections = Arr::map($result['collections'], function ($item) {
            return Arr::only($item,
                [
                    'id',
                    'title',
                ]
            );
        });
        return $collections;
    }
       
    }
}
