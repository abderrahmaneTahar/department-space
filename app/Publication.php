<?php

namespace App;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use softDeletes;

    protected $dates = ['deleted-at'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }

    public function module() {

    	return $this->belongsTo('App\Modele');
    }
}
