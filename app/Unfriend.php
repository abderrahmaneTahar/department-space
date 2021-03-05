<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unfriend extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function unfriends(){

    	return $this->hasMany('App\User');
    }

}
