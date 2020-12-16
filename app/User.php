<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login_id', 'password','belongs_to','insta_id'
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

    public function tattoos()
    {
        return $this->hasMany(Tattoo::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function introduces()
    {
        return $this->hasMany(Introduce::class);
    }
    public function ecimages()
    {
        return $this->hasMany(Ecimage::class);
    }
}
