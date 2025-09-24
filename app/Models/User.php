<?php

namespace App\Models;

// use Filament\Models\Contracts\FilamentUser;
// use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Jetstream\HasProfilePhoto;
// use Laravel\Sanctum\HasApiTokens;
// use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
// use Kreait\Firebase\Exception\Auth\UserNotFound;

class User extends Authenticatable // implements  JWTSubject
{
    // use HasApiTokens;
    // use HasProfilePhoto;
    use Notifiable;
    // use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'demo',
        'name',
        'password',
        'email',
        'country_code',
        'phone',
        'fcm_token',
        'profile_photo_path',
        'default_address_id',
        'email_verified_at',
        'created_at',
        'updated_at',
        'referrer_id',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->profile_photo_path 
            ? asset('storage/' . $this->profile_photo_path)
            : $this->defaultProfilePhotoUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    // JWT methods - uncomment when JWT package is installed
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }

    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }

    // Filament panel access - uncomment when Filament is installed
    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return str_ends_with($this->email, '@sandpitnquarry.com') && $this->hasVerifiedEmail();
    // }

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            $user['name']  = strtoupper($user["name"]);
            $auth = app('firebase.auth');
            try {
                $auth->getUserByEmail($user['email']);
                return false;
            } catch (\Exception $e) {
                try {
                    $auth->getUserByPhoneNumber("+" . $user["phone"]);
                    return false;
                } catch (\Exception $e) {
                    if (!empty($user['password'])) {
                        $user['password'] = Crypt::encryptString($user['password']);
                    }
                    return true;
                }
            }
        });

        static::created(function (User $user) {
            $auth = app('firebase.auth');
            $userProperties = [
                'uid' => "$user->id",
                'email' => $user->email,
                'emailVerified' => false,
                'phoneNumber' => "+" . $user->phone,
                'displayName' => strtoupper($user->name),
                'disabled' => false,
            ];
            if ($user->password != null) {
                $userProperties['password'] = Crypt::decryptString($user->password);
            }

            $auth->createUser($userProperties);

            $auth->setCustomUserClaims("$user->id", [
                'customer' => json_encode($user),
            ]);
        });

        static::updating(function (User $_user) {
            $auth = app('firebase.auth');
            try {
                $user = $auth->getUser($_user['id']);
                if (!empty($_user['email']) && $user->email != $_user['email']) {
                    try {
                        $auth->getUserByEmail($_user['email']);
                        return false;
                    } catch (\Exception $e) {
                    }
                }

                if (!empty($_user['phone']) && $user->phoneNumber != $_user['phone']) {
                    try {
                        $auth->getUserByPhoneNumber($_user['phone']);
                        return false;
                    } catch (\Exception $e) {
                    }
                }

                return true;
            } catch (\Exception $e) {
                return false;
            }
        });

        static::updated(function (User $user) {
            $auth = app('firebase.auth');
            try {
                $auth->getUser($user->id);
                if ($user->email != null) {
                    $userProperties['email'] = $user->email;
                }
                if ($user->phone != null) {
                    $userProperties['phoneNumber'] = "+" . $user->phone;
                }
                if ($user->displayName != null) {
                    $userProperties['displayName'] = strtoupper($user->name);
                }
                $auth->updateUser("$user->id", $userProperties);
            } catch (\Exception $e) {
            }
        });
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'referrer_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function customer_details(): HasMany
    {
        return $this->hasMany(CustomerDetail::class, 'customer_id');
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

    // public function referrer(): HasOne
    // {
    //     return $this->hasOne(Referrer::class);
    // }
    public function referrer(): BelongsTo
    {
        return $this->belongsTo(Referrer::class);
    }

    public function ssm(): HasOne
    {
        return $this->hasOne(CustomerDetail::class)->ofMany([
            'id' => 'max',
        ], function (Builder $query) {
            $query->where('type', "SSM");
        });
    }

    public function tokens(): MorphMany
    {
        return $this->morphMany(Token::class, 'tokenable');
    }

    public function transporter(): HasOne
    {
        return $this->hasOne(Transporter::class, 'user_id');
    }
}
