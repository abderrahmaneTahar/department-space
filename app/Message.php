<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['body','reciver_id','sender_id','read'];


      public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

        
    public function reciver()
    {
        return $this->belongsTo(User::class, 'reciver_id');
    }

    
} 
