@extends('layouts.app2')

@section('content')

<div class="container" style="margin-top: 35px;">
  <div class="row justify-content-center">
     <div class="col-md-9">

      <!--    <a href="{{ route('prof.register') }}" class=" form-control btn btn-success" style="margin-bottom: 15px;"><h5 > add a new Prof</h5></a> -->

      <h2 style="font-family: serif;font-weight: 700;">List des Ensignants :</h2>
      <div style="float:right!important;">
       <a href="{{ route('prof.register') }}" class="btn" style="background-color: #2A8CA9;color: #fff;height: 10px;" ><h1 style="margin-top: -22px;">+</h1></a> 
      </div>

      <table class="table" style="background-color: #fff; border: 2px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">
        <head>
          <tr class="card-header ">
            <th>nom du Prof</th>
            <th>email</th>
            <th>action</th>
          </tr>
        </head>

        <body>
          
          @foreach($prof as  $profs)
          <tr style="background-color: white;">
            <td>{{$profs->name}}</td>
            <td>{{$profs->email}}</td>
            <td>
              
              <form action="{{url('admin/prof_delete/'.$profs->id)}}" method="post" style="margin-top: 5px;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit"  class="btn btn-default">suprimer</button>
              </form>
            </td>
          </tr>
          @endforeach
        </body>

      </table>

      {{$prof->links()}}

     </div>
  </div>
</div>   
@endsection      