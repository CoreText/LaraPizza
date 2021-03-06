<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * When profile created assign user_id, so the profile could be attached to user
     */
    protected static function boot()
    {
        parent::boot();

        static::created(static function ($user) {
            $user->profile()->create([
                'user_id' => $user->id,
            ]);
        });
    }

    public function pizzas()
    {
        return $this->hasMany(Pizza::class)->orderBy('created_at', 'DESC');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class)->orderBy('created_at', 'DESC');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
