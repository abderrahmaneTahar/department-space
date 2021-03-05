<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Unfriend;
use Illuminate\Http\Request;
use App\Events\newMessage;

class messageController extends Controller
{
 
  public function inbox (Request $request){
  $user = User::find($request->user_id);
  return $user->recived()->where('read',0)->orderby("created_at","DESC")->with('sender')->get();

  }

  public function read ($id){
    $message = Message::find($id);
    $message->read = 1;
    $message->save();

    return 0;
  }

    public function sent (Request $request){
  $user = User::find($request->user_id);
  return $user->sent()->where('read',NULL)->orderby("created_at","DESC")->with('reciver')->get();


  }

  public function recived (){
    $messages = Auth::user()->recived()->orderby("created_at","DESC")->with('sender')->paginate(10);
    //dd($messages);
     return view('recived_messages',compact('messages')); 
  }

  public function Isent (){

    $messages = Auth::user()->sent()->orderby("created_at","DESC")->with('reciver')->paginate(10);
     return view('sent_messages',['messages' => $messages]);
  }

  public function store (Request $request,$id){

    $user = User::find($request->user_id);
    $user->sendMessageTo($id,$request->body);

    $message = Message::where('sender_id',$request->user_id)->where('reciver_id',$id)->with('sender')->orderby("created_at","DESC")->first();

    event (new newMessage ($message));

  	return $message;
  }
   

   public function friends (Request $request) {
        
        $unfriends = User::find(1)->unfriended->pluck('id')->toarray();
      dd($unfriends);
       $users = User::where('name','like',$request->friendsBox.'%')->whereIn('id',$unfriends)->get();

        return response (['data' => $users],200);

    } 

    public function notify(){
      $unread = Auth::user()->recived()->where('read',0)->get();
      return lenght($unread);   
    }

    public function email(Request $request){
     
    $user = User::find($request->user_id);
    $rid = User::where('email',$request->email)->pluck('id');
    $Rid = $rid[0];
    $user->sendMessageTo($Rid,$request->sms);

    $message = Message::where('sender_id',$request->user_id)->where('reciver_id',$Rid)->with('sender')->orderby("created_at","DESC")->first();

    event (new newMessage ($message));

    return $message;      
    }
}
   // $messages = Message::where('reciver_id',$id)->where('sender_id',$request->user_id)->orwhere('sender_id',$id)->where('//reciver_id',$request->user_id)->get();