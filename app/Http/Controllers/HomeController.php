<?php

namespace App\Http\Controllers;

use App\Publication;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('pub');
    }

    public function recherche(Request $request){
        if($request->select == 'persone')
        {
         $unfriends = User::find(Auth::user()->id)->unfriends->pluck('id')->toarray();
         $unfriended = User::find(Auth::user()->id)->unfriended->pluck('id')->toarray();

         $users = User::where('name','like',$request->search.'%')->whereNotIn('id',$unfriends)
         ->whereNotIn('id',$unfriended)->whereNotIn('id',[Auth::user()->id])->paginate(12);
         return view('user_search',['users' => $users]);
        }
        else{
         $publications = Publication::where('valide',1)->where('titre','like',$request->search.'%')
                     ->orderBy("updated_at","DESC")
                     ->with('user')->paginate(5);
         return view('pub_search',['publications' => $publications]);
        }
    }
}
