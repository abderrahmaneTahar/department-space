<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'est_Prof'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function publications()
    {
        return $this->hasMany('App\Publication');
    }

    public function unfriends()
    {
    return $this->belongsToMany('App\User', 'unfriends', 'user_id', 'unfriend_id');
    }

    public function unfriended()
    {
    return $this->belongsToMany('App\User', 'unfriends', 'unfriend_id', 'user_id');
    }


   public function unfriend(User $user)
   {
    $this->unfriends()->attach($user->id);
   }

public function friend(User $user)
   {
    $this->unfriends()->detach($user->id);
   }

   
    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    
    public function recived()
    {
        return $this->hasMany(Message::class, 'reciver_id');
    }
   
    

     public function sendMessageTo($id, $message)
    {
        return $this->sent()->create([
            'body'       => $message,
            'reciver_id' => $id,
        ]);   
    }
}

