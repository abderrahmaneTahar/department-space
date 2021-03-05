<?php
  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Auth;
use App\Module;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\publicationRequest;

class PublicationController extends Controller
{
    

        public function index() 
    {    

        $posts = Publication::where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(4)->with('user')
                     ->offset(0)
                     ->get();

        return view('pub',['posts'=>$posts]);
     
    }

    public function parNiveau($fillter){
      $module = Module::where('niveau',$fillter)->pluck('nom')->toarray();
      $publications = Publication::whereIn('module',$module)->where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(4)->with('user')
                     ->offset(0)
                     ->get();
      return $publications->toJson();
    }

    public function parModule($modul){
      $publications = Publication::where('module',$modul)->where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(4)->with('user')
                     ->offset(0)
                     ->get();
      return $publications->toJson();
    }

    public function indexContunu(Request $request) 
    {    
        if ($request->scrollOn == 'niveau'){
          if (isset($request->offset)) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

              $module = Module::where('niveau',$request->fillter)->pluck('nom')->toarray();
      $publications = Publication::whereIn('module',$module)->where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(4)->with('user')
                     ->offset($offset)
                     ->get();
      return $publications->toJson();
     
        }

        elseif ($request->scrollOn == 'module'){
          if (isset($request->offset)) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

      $publications = Publication::where('module',$request->module)->where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(4)->with('user')
                     ->offset($offset)
                     ->get();
      return $publications->toJson();
     
        }

        else{
        if (isset($request->offset)) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

        $posts = Publication::where('valide',1)
                     ->orderBy("updated_at","DESC")
                     ->limit(1)->with('user')
                     ->offset($offset)
                     ->get();

        return $posts;
      }
     
    }


      public function myPublicationIndex()
    {
     $publications = Publication::where('user_id',Auth::user()->id)->orderby("updated_at","DESC")->paginate(9);
     return view('publications.myPublication',['publication' => $publications]);
      
    }
    public function create()
    {
       return view('publications.create');
    }

    

    public function store(publicationRequest $request)
    {
       $publication = new Publication();
       $publication->titre = $request->input('titre');
       $publication->body = $request->input('body');
       $publication->user_id = Auth::user()->id;
       if($request->hasFile('file')){
       	 $publication->file = $request->file->store('files','public');
       }
       
       $publication->module = $request->input('module');
       if (Auth::user()->est_Prof) {
         $publication->valide = 1;
       }
       
       $publication->save();

       return redirect()->route('pub');
    }

   

    public function edit($id)
    {
      $publication = Publication::find($id);
      return view('publications.edit',compact('publication'));
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

      return redirect('publications');
    }
    public function destroy($id)
    {
       $publication = Publication::find($id);
       $publication->delete();
       return redirect()->route('my_pub');
    }

  //  public function download($pub_id){

 //     $pub = Publication::find($pub_id);
 //       $path = $pub->file ;

      
 //     return Response()->download('storage/'.$path);
      
      
 //   }
}
