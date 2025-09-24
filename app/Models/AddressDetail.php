<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Http;

class AddressDetail extends Model
{
    protected $appends = ['full', 'title', 'subtitle'];

    protected $casts = [
        'name' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
    ];

    protected $fillable = [
        'address_id',
        'status',
        'type',
        'latitude',
        'longitude',
        'name',
        'address_1',
        'address_2',
        'postcode',
        'city',
        'state',
        'link',
        'creator_id',
        'created_at',
        'updated_at',
    ];

    protected $touches = ['address'];

    protected static function booted(): void
    {
        static::creating(function (AddressDetail $address_detail) {

            if (!empty($address_detail['address_1'])) {
                $address_detail['address_1'] = strtoupper($address_detail['address_1']);
            }
            if (!empty($address_detail['address_2'])) {
                $address_detail['address_2'] = strtoupper($address_detail['address_2']);
            }
            if (empty($address_detail['creator_id']) || !is_int($address_detail['creator_id']) || $address_detail['creator_id'] < 1) {
                $address_detail['creator_id'] = $address_detail->address->user_id;
            }
            if (($address_detail['type'] == 'Site') && (empty($address_detail['latitude']) || empty($address_detail['latitude']))) {
                $full_address = $address_detail['address_1'] . ',' . $address_detail['address_2'] . $address_detail['city'] . ',' . $address_detail['postcode'] . ',' . $address_detail['state'];

                $response = Http::get(
                    'https://maps.googleapis.com/maps/api/geocode/json',
                    [
                        'key' => env('GOOGLE_API_KEY'),
                        'address' => $full_address,
                    ]
                )['results'];

                $address_detail['latitude'] = $response[0]['geometry']['location']['lat'];
                $address_detail['longitude'] = $response[0]['geometry']['location']['lng'];
            }
        });
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => empty($value) ? '' : $value,
        );
    }

    public function getFullAttribute()
    {
        $full = sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;

        if ($this->address_1 != null &&  strlen($this->address_1) > 3 && $this->address_2 != null && strlen($this->address_2) > 3) {
            $full = $this->address_1 . ', ' . $this->address_2 . ',' . sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;
        } elseif ($this->address_1 != null && strlen($this->address_1) > 3) {
            $full = $this->address_1 . ',' . sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;
        } elseif ($this->address_2 != null && strlen($this->address_2) > 3) {
            $full = $this->address_2 . ',' . sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;
        }

        return $full;
    }

    public function getTitleAttribute()
    {
        $title = sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;

        if ($this->address_1 != null &&  strlen($this->address_1) > 3 && $this->address_2 != null && strlen($this->address_2) > 3) {
            $title = $this->address_1 . ', ' . $this->address_2;
        } elseif ($this->address_1 != null && strlen($this->address_1) > 3) {
            $title = $this->address_1;
        } elseif ($this->address_2 != null && strlen($this->address_2) > 3) {
            $title = $this->address_2;
        }

        if (strlen($this->name) > 3) {
            $title = $this->name . ', ' . $title;
        }

        return $title;
    }

    public function getSubtitleAttribute()
    {
        return sprintf('%05d', $this->postcode) . ', ' . $this->city . ', ' . $this->state;
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city', 'name');
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'address_detail_id', 'id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'address_detail_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function address_postcode(): BelongsTo
    {
        return $this->belongsTo(Postcode::class, 'postcode', 'postcode');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(AddressState::class, 'state', 'name');
    }
}
