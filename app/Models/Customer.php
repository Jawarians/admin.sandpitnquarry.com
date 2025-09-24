<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Laravel\Sanctum\HasApiTokens;
// use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable // implements  JWTSubject
{
    // use HasApiTokens;

    protected $table = 'users';

    protected $casts = [
        'id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
        'coins_sum_amount' => 'integer',
    ];

    // protected static function booted(): void
    // {
    //     static::creating(function (Customer $customer) {
    //         $customer['name']  = strtoupper($customer["name"]);
    //         $password = Str::random(15);
    //         $customer['password'] = Hash::make($password);
    //         return true;
    //     });
    // }

    // protected $hidden = ['password'];

    protected $fillable = [
        'id',
        'name',
        'password',
        'email',
        'country_code',
        'phone',
        'fcm_token',
        'address_id',
        'profile_photo_path',
        'default_address_id',
        'email_verified_at',
        'created_at',
        'updated_at',
        'tin_number',
        'access_token'
    ];

    // JWT methods - uncomment when JWT package is installed
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }

    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class, 'user_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function business_prices(): HasMany
    {
        return $this->hasMany(BusinessPrice::class, 'user_id');
    }

    public function code(): HasOne
    {
        return $this->hasOne(Code::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $now = Carbon::now();
            $query->where('used', false);
            $query->where('verify', '=', false);
            $query->where('created_at', '>=', $now->subMinutes(5)->format('Y-m-d H:i:s'));
        });
    }

    public function codes(): HasMany
    {
        return $this->hasMany(Code::class, 'user_id');
    }

    public function coins(): HasMany
    {
        return $this->hasMany(Coin::class, 'user_id');
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer_account(): HasOne
    {
        return $this->hasOne(CustomerAccount::class, 'user_id', 'id')->latestOfMany();
    }

    public function customer_accounts(): HasMany
    {
        return $this->hasMany(CustomerAccount::class, 'user_id');
    }

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class, 'user_id');
    }

    public function latest(): HasOne
    {
        return $this->hasOne(CustomerDetail::class)->latestOfMany();
    }

    public function office(): HasOne
    {
        return $this->hasOne(Address::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereHas('latest', function ($query) {
                $query->where('type', 'Office');
                $query->whereNot('status', 'Deleted');
            });
        });
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function profile_image(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable')->latestOfMany();
    }

    public function pin(): HasOne
    {
        return $this->hasOne(Pin::class, 'id', 'id');
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class, 'user_id');
    }

    public function dividends(): HasMany
    {
        return $this->hasMany(DividendPoint::class, 'user_id');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'user_id');
    }

    public function referrer(): HasOne
    {
        return $this->hasOne(Referrer::class, 'id', 'id');
    }

    public function ssm(): HasOne
    {
        return $this->hasOne(CustomerDetail::class)->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->where('type', "SSM");
        });
    }

    public function cash_account(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereHas('account_details', function ($query) {
                $query->whereHas('oldest', function ($query) {
                    $query->where('term', 0);
                });
            });
        });
    }

    public function cashAccount(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereHas('account_details', function ($query) {
                $query->whereHas('oldest', function ($query) {
                    $query->where('term', 0);
                });
            });
        });
    }

    public function credit_account(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereHas('account_details', function ($query) {
                $query->whereHas('oldest', function ($query) {
                    $query->where('term', '>', 0);
                });
            });
        });
    }

    public function creditAccount(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id')->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereHas('account_details', function ($query) {
                $query->whereHas('oldest', function ($query) {
                    $query->where('term', '>', 0);
                });
            });
        });
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role')->withPivot('company_id');
    }

    public function transporter(): HasOne
    {
        return $this->hasOne(Transporter::class, 'user_id');
    }

    public function customerNotifications(): HasMany
    {
        return $this->hasMany(CustomerNotification::class, 'user_id');
    }
}
