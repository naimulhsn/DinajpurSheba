<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function image(){
        return $this->hasOne('App\Image');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }

    protected $guarded = [];

    
}
