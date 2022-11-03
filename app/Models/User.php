<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
    * Get the user's full name
    *
    *@return string
    */
    public function getFullNameAttribute()
    {
        return Str::ucfirst($this->first_name).' '.Str::ucfirst($this->last_name);
    }

    /**
     * Set the user's first name
     * 
     * @param string $value
     * @return void
     */
    public function setFirstNameAttribute($value) 
    {
        $this->attributes['first_name'] = Str::ucfirst($value);
    }

    /**
     * Set the user's last name
     * 
     * @param string $value
     * @return void
     */
    public function setLastNameAttribute($value) 
    {
        $this->attributes['last_name'] = Str::ucfirst($value);
    }
}
