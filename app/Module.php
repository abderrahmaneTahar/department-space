<?php

namespace App;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use softDeletes;

    protected $dates = ['deleted-at'];

    public function publications(){

    	return $this->hasMany('App\Publication');
    }
}
