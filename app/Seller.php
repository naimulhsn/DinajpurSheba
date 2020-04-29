<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function user(){
        return $this->belongsTo('app\User');
    }

    protected $fillable = [
        'user_id','address','nid','verified','verified_by','image',
    ];
}
