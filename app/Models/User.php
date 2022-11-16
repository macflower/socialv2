<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'birthday',
        'career',
        'about',
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

    public function getAge()
    {
        return Carbon::parse($this->birthday)->age ? : '';
    }

    # Связь многие ко многим
    public function friends()
    {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id');
    }

    # Добавить в друзья
    public function addFriend($id)
    {
        $this->friends()->attach($id);
    }

    # Отменить запрос в друзья
    public function cancelFriend($id)
    {
        $this->friends()->detach($id);
    }

    # Запрос в друзья на рассмотрении
    public function friendRequestPending()
    {
        return $this->friends()->wherePivot('accepted', false)->get();
    }

    # Есть запрос на добавление в друзья
    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }
}
