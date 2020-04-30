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

    protected $guarded = [];

    
}
