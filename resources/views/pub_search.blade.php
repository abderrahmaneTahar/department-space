@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
        <div class="col-md-10">       
              @foreach($publications as $publication) 
            <div class="card"  style="margin-bottom: 15px;border: 5px ;border:1px solid #288AA5;box-shadow: 0 2px 2px rgba(0,0.3,0.2,0.4);">
                
                <div class="card-header " style="background-color: white;border: 0px #fff;">
                  <img src="'/storage/'.$publication->user->avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;"><h6 style="color: black;margin-top: 5px;">{{$publication->user->name}} </h6><h6 style="color: #0077AC;">{{$publication->updated_at}}</h6></div>
              
                <div class="card-body">
                  <h5>{{$publication->titre}} </h5>
                   <p> {{$publication->body}}</p> 
                      @if($publication->file)
                       <div  style="float:right!important;margin-top: 20px;">
                        {{$publication->file}}
                       <a class="pull-bottom" :href="'/storage/'+post.file" :download="post.file">
                         <button type="button" class="btn btn-sm btn-primary my-2 my-sm-0" style="margin-bottom: 20px;margin-left: 5px;background-color: #2A8CA9;">
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

    </div>
</div>

@endsection