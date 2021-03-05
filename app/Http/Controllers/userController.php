<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Info_general;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class userController extends Controller
{
    public function profile(){

    	return view('profile', array('user'=> Auth::user()));
    }

    public function visitProfile ($id){

        $user = User::find($id);
        return view('profile', array('user'=> $user));
    }

    public function update_profile(Request $request){
 
      Auth::user()->niveau = $request->niveau;
      Auth::user()->tel = $request->tel;
      Auth::user()->social_media = $request->social_media;
      Auth::user()->description = $request->description;
    	if($request->hasFile('avatar')){
       	 Auth::user()->avatar = $request->avatar->store('avatars','public');
       }

       Auth::user()->save();

       return redirect('profile');
    }

   
}
