@extends('layouts.app2')
 
@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-10" >
          <a href="{{ route('admin_create') }}" class=" form-control btn btn-default" style="margin-bottom: 35px;background-color: white;border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);"><h5 style="color: #2A8CA9;"> Ajouter une nouvelle publication</h5></a>
          <h3 style="font-family: serif;font-weight: 700;margin-bottom: 20px">Admin Publications :</h3>
            
              @foreach($publication as $publications)
              <div class="card" style="margin-bottom: 20px; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">
              
              <div class="card-header " >
              <h6 style="color: #0077AC;float: right;">{{$publications->updated_at}}</h6>
            </div>

                <div class="card-body">
                  <h5>{{$publications->titre}} :</h5>
                   <p> {{$publications->body}}</p> 
                  
                   <form action="{{url('admin/publications/delete'.$publications->id)}}" method="post" style="float: right;margin-top: 20px;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a href="{{ url('admin/publicationss/'.$publications->id.'/edit') }}" class="btn" style="background-color: #2A8CA9;color: #fff;margin-right: 5px;">modifier</a>
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