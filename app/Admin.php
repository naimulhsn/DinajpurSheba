<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function user(){
        return $this->belongsTo('app\User');
    }
    
    //
    protected $fillable = [
        'user_id','address','image',
    ];
}
