<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use Notifiable;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    function getDeviceTokens()
    {
        return $this->tokens->pluck('token')->unique()->toArray();
    }

    /**
     * Specifies the user's FCM tokens
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->getDeviceTokens();
    }

    public function tokens(): MorphMany
    {
        return $this->morphMany(Token::class, 'tokenable');
    }
}
