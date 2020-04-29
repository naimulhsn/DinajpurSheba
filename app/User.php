<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function admin(){
        return $this->hasOne('App\Admin');
    }
    public function seller(){
        return $this->hasOne('App\Seller');
    }
    public function buyer(){
        return $this->hasOne('App\Buyer');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }




















    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'phone', 'password',
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
    // protected $casts = ['email_verified_at' => 'datetime',];
}
