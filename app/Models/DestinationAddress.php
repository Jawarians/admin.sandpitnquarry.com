<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Http;

class DestinationAddress extends Address
{
    protected $table = 'addresses';

    protected $fillable = [
        'creator_id',
        'user_id',
    ];

    /// Can't add to Address model to avoid multiple call to Google API distance matrix
    protected $appends = ['sites'];

    public function getSitesAttribute()
    {
        $price = Price::where('published_at', '<', now())
                ->orderBy('published_at', 'desc')
                ->first();

        $sites = Site::whereHas('price_items', function ($query) use ($price) {
            /// wheel id = 1 for by tonne
            $query->where('wheel_id', 1);
            $query->where('price_id', $price->id);
            $query->whereHas('product', function ($query) {
                $query->where('active', 1);
            });
        })
            ->with('price_items', function ($query) use ($price) {
                /// wheel id = 1 for by tonne
                $query->where('wheel_id', 1);
                $query->where('price_id', $price->id);
                $query->whereHas('product', function ($query) {
                    $query->where('active', 1);
                });
            })
            ->orderBy('id')
            ->get();

        $response = Http::get(
            'https://maps.googleapis.com/maps/api/distancematrix/json',
            [
                /***
                 * language
                 * region
                 * traffic_model
                 * unit
                 */

                'key' => env('GOOGLE_API_KEY'),
                'origins' => implode("|", $sites->pluck('lat_lang')->toArray()),
                'destinations' => $this->latest->latitude . ',' . $this->latest->longitude,
                'departure_time' => Carbon::now()->timestamp,
                'avoid' => 'tolls|highways',
            ]
        );
        for ($x = 0; $x < count($response['rows']); $x++) {
            for ($y = 0; $y < count($response['rows'][$x]['elements']); $y++) {
                $sites[$x]['distance_text'] = $response['rows'][$x]['elements'][$y]['distance']['text'];
                $sites[$x]['distance_value'] = $response['rows'][$x]['elements'][$y]['distance']['value'];
                $sites[$x]['duration_text'] = $response['rows'][$x]['elements'][$y]['duration']['text'];
                $sites[$x]['duration_value'] = $response['rows'][$x]['elements'][$y]['duration']['value'];
                $sites[$x]['traffic_text'] = $response['rows'][$x]['elements'][$y]['duration_in_traffic']['text'];
                $sites[$x]['traffic_value'] = $response['rows'][$x]['elements'][$y]['duration_in_traffic']['value'];
                $traffic_minutes = floor($sites[$x]['traffic_value'] / 60);
                $transporter_fee = TransporterFee::where('start_at', '<', now())
                    ->with(['transporter_fee_details' => function ($query) use ($traffic_minutes) {
                        $query->where('start', '<', $traffic_minutes);
                        $query->orderBy('start', 'desc');
                    }])
                    ->orderBy('start_at')
                    ->first();
                $sites[$x]['transporter_fee'] = 0;

                for ($z = 0; $z < count($transporter_fee->transporter_fee_details); $z++) {
                    $charge_mins =  $traffic_minutes - $transporter_fee->transporter_fee_details[$z]->start;
                    $sites[$x]['transporter_fee'] = $sites[$x]['transporter_fee'] + $charge_mins * ($transporter_fee->transporter_fee_details[$z]->charge  / $transporter_fee->transporter_fee_details[$z]->duration);
                    $traffic_minutes = $traffic_minutes - $charge_mins;
                }

                $sites[$x]['price'] =  $sites[$x]['price_items'][0]['amount'] + $sites[$x]['transporter_fee'];
            }
        }
        return $sites->sortBy('price')->values();
    }

    public function address_details(): HasMany
    {
        return $this->hasMany(AddressDetail::class, 'address_id', 'id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(AddressDetail::class, 'address_id', 'id')->latestOfMany();
    }
}
