<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use App\Http\Requests\publicationRequest;
use App\Http\Requests\profRequest;
use App\User;
use Auth;
use App\Admin;
use App\Module;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function profList()
    {   
        $profs = User::where('est_Prof',1)->paginate(10);
        return view('admin.profList',['prof' => $profs]);
    }

    public function prof_destroy($id)
    {
       $prof = User::find($id);
       $prof->delete();
       return redirect()->route('profList');
     }

     public function add_prof(profRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'est_Prof' => 1,
            'avatar' => 'avatars/prof.png',
        ]);

        return redirect()->route('profList');
    }

    public function admin_pub(){
      $publications = Admin::find(1)->publications()->orderby("created_at","DESC")->paginate(10);
      return view('admin_pub',['publications' => $publications]);
    }
      public function index()
    {
     $publications = Publication::where('valide',0)->orderBy("updated_at","DESC")->with('user')->paginate(10);
    // dd($publications);
     return view('publications.publications',['publications' => $publications]);
    }
    
    public function accupte($id) {

        $publication = Publication::find($id);
       
      if($publication){  $publication->valide = 1;

        $publication->save();

        return redirect()->route('adminIndex');}
        else{
          $publications = Admin::find(1)->publications()->orderby("created_at","DESC")->paginate(10);
      return view('admin_pub',['publication' => $publications]);
        }
    }

    public function admin_create()
    {
       return view('publications.admin_create');
    }

     public function admin_store(publicationRequest $request)
    {
       $publication = new Publication();
       $publication->titre = $request->input('titre');
       $publication->body = $request->input('body');
       $publication->admin_id = Auth::user()->id;
       if($request->hasFile('file')){
         $publication->file = $request->file->store('files','public');
       }
       
       $publication->module = $request->input('module');
      
         $publication->valide = 1;
       
       
       $publication->save();

       return redirect()->route('admin_pub');
    }

    
    public function edit($id)
    {
      $publication = Publication::find($id);
      return view('publications.admin_update',compact('publication'));
    }
    public function update(publicationRequest $Request,$id)
    {
      $publication = Publication::find($id);
      $publication->titre = $Request->input('titre');
      $publication->body = $Request->input('body');
      if($Request->hasFile('file')){
         $publication->file = $Request->file->store('files');
       }
      $publication->module = $Request->input('module');

      $publication->save();

      return redirect('publications.admin_publications');
    }
    public function destroy($id)
    {
       $publication = Publication::find($id);
       $publication->delete();
       return redirect()->route('adminIndex');
    }

        public function modules_index()
    {
        $module = Module::all();
        return view('admin.modules',['module' => $module]);
    }

}
