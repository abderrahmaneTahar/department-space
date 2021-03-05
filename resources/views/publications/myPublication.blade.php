@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
        <div class="col-md-11" >
          <a href="{{ route('create') }}" class=" form-control btn btn-default" style="margin-bottom: 35px;background-color: white;border: 1px solid #005B8E;"><h5 style="color:#005B8E;"> Ajouter une nouvelle publication</h5></a>
          <h2 style="font-family: serif;font-weight: 700;margin-bottom: 20px;">Mes Publications :</h2>
            
              @foreach($publication as $publications)
              <div class="card" style="margin-bottom: 20px;border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">
              
              <div class="card-header " >

              <h6 style="color: #0077AC;float: right;">{{$publications->updated_at}}</h6>
              <h5>{{$publications->module}}</h5>
            </div>

                <div class="card-body">
                  <h5>{{$publications->titre}} :</h5>
                   <p> {{$publications->body}}</p> 
                  
                   <form action="{{url('publications/'.$publications->id)}}" method="post" style="float: right;margin-top: 20px;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a href="{{ url('publications/'.$publications->id.'/edit') }}" class="btn" style="background-color: #2A8CA9;color: #fff;margin-right: 5px">modifier</a>
                <button type="submit"  class="btn btn-default">suprimer</button>
              </form>
                    @if($publications->file) 
                      <div  style="float:left!important;margin-top: 20px;">
                       <a class="pull-bottom" href="{{'/storage/'.$publications->file}}" download="{{$publications->file}}">
                         <button type="button" class="btn  btn-light" style="color: #2A8CA9;">
                           tellecharger
                         </button>
                        </a>
                      </div>
                    @endif
                </div>
               </div>
               @endforeach
             
             {!! $publication->render() !!}
             </div>
          </div>
          
    </div>
@endsection      