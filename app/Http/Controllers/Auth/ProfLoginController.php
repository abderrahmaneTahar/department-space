<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ProfLoginController extends Controller
{   
	public function __construct()
   {
   	$this->middleware('guest:prof',['except' => ['logout']]);
   }
    public function showLoginForm()
    {
    	return view('auth.prof-login');
    }
    
      public function login(Request $request)
  {

     $this->validate($request,[
     	'email'=>'required|email', 
        'password'=>'required|min:6'
      ]);

    if (auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)) {
    	return redirect()->intended(route('admin.dashboard'));
    }

    return redirect()->back()->withInput($request->only('email','remember'));
  }

  public function logout()
    {
        Auth::guard('prof')->logout();

        return redirect('/');
    }
}
