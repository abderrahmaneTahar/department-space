 
@extends('layouts.app2')

@section('content')

<div class="container" style="margin-top: 35px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 style="font-family: serif;font-weight: 700;margin-bottom: 20px">les Publications des etudiants en attend:</h3>
              @foreach($publications as $publication)
              <div class="card" style="margin-bottom: 20px;border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">
              
              <div class="card-header " >
                <h5 style="float: right;">systéme information</h5>
               <img src="{{'/storage/'.$publication->user->avatar}}" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;">
               <h6 style="color: black;margin-top: 5px;">{{$publication->user->name}} </h6>
              <h6 style="color: #0077AC;">{{$publication->updated_at}}</h6>
            </div>

                <div class="card-body">
                  <h5>{{$publication->titre}} </h5>
                   <p> {{$publication->body}}</p> 
                  
                   <form action="{{url('/admin/publications/'.$publication->id)}}" method="post" style="float: right;margin-top: 5px;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a href="{{ url('/admin/publications/'.$publication->id) }}" class="btn " style="background-color: #2A8CA9;color:#fff;margin-right: 5px;">accupte</a>
                <button type="submit"  class="btn btn-default" style="color: #2A8CA9;">refusée</button>
              </form>
                    @if($publication->file) 
                      <div  style="float:left!important;margin-top: 5px;">
                       <a class="pull-bottom" href="{{'/storage/'.$publication->file}}" download="{{$publication->file}}">
                         <button type="button" class="btn btn-outline-primary">
                           download
                         </button>
                        </a>
                      </div>
                    @endif
                </div>
               </div>
               @endforeach
             
             {!! $publications->render() !!}
             </div>
          </div>
          
    </div>
        
        
@endsection  
