<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\moduleRequest;
use App\Module;
use Auth;

class moduleController extends Controller
{

    public function nomModules($fillter){
    
        $module = Module::where('niveau',$fillter)->get();
        return response(['data'=> $module],200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.modules');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(moduleRequest $request)
    {   
        $module = new Module();
        $module->code = $request->input('code');
        $module->nom = $request->input('nom');
        $module->niveau = $request->input('niveau');

        $module->save();

        return redirect()->route('modules_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();
        return redirect()->route('modules_index');
    }
}
