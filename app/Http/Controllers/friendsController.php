<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Unfriend;
use App\Prof_friend;
use Illuminate\Http\Request;

class friendsController extends Controller
{
//  public function profFriendsIndex (){
//
//    return view('profFriends');
//  }
//
//
//  public function profFriendslist (){
//
//      $friends = Auth::user()->prof_freinds();
//      return response (['data' => $friends],200);
//
//  }
//
//  public function profFriends () {
//
//        $freinds = Auth::user()->prof_freinds()->get(['friend_id']);
//        $users = User::where('name','like',$request->name.'%')->whereNotIn('id',$friends)->get();
//
//        return response (['data' => $users],200);
//
//  }
//
//     public function profFriending () {
//
//        $friend = new Prof_friend;
//        $friend->prof_id = user_id;
//        $friend->friend_id = $id;
//
 //       $friend->save();
//
 //       $friends = Auth::user()->prof_freinds();
//      return response (['data' => $friends],200);
//
//   }
//
//      public function porfUnfriending () {
//
//        $friend = Prof_Frenid::where('prof_id',Auth::user()->id)->where('freind_id',$id);
//        $friend->delete();
//        return erdirect('prof_friends');
//
//   }
//

     public function unfriendsIndex (){

    return view('unfriends');
    }
  
   public function friends (Request $request) {
        
        $unfriends = User::find($request->user_id)->unfriends->pluck('id')->toarray();
        $unfriended = User::find($request->user_id)->unfriended->pluck('id')->toarray();

       $users = User::where('name','like',$request->friendsBox.'%')->whereNotIn('id',$unfriends)->whereNotIn('id',$unfriended)->whereNotIn('id',[$request->user_id])->get();

        return response (['data' => $users],200);

    }



  public function unfriends (Request $request) {
        
         $unfriends = User::find($request->user_id)->unfriends;

         return response (['data'=> $unfriends],200);

   }



    public function unfriending (Request $request,$id) {
      $user = User::find($request->user_id);
      $user->unfriends()->attach($id);
    
     $unfriend = User::find($request->user_id)->unfriends;

     return response (['data1'=> $unfriend],200);
  }




   public function friending (Request $request,$id) {

       $user = User::find($request->user_id);
       $user->unfriends()->detach($id);
    
       $unfriend = User::find($request->user_id)->unfriends;

       return response (['data1'=> $unfriend],200);
   }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function FriendsMessaging (){

        $friends = Friend::where('user_id',Auth::user()->id);
        return view('messages',['friends' => $friends]);
    }

}
