@extends('layouts.app2')

@section('content')

@if(count($errors))
<div class="container alert " style="background-color:#2A8CA9; " role="alert" style="margin-top: 100px;margin-left: 220px;">
  <ul>
    @foreach($errors->all() as $message)
    <li>
      {{ $message }}
    </li>
    @endforeach
  </ul>
</div>
@endif

<div class="container" style="margin-top: 35px;">
  <div class="row justify-content-center">
     <div class="col-sm-9">

      <h2 style="font-family: serif;font-weight: 700;">liste des modules :</h2>
      <div style="float:right!important;">

        <a href="#+" data-toggle="modal"  class="btn" style="background-color: #2A8CA9;color: #fff;height: 10px;"> <h1 style="margin-top: -22px;">+</h1> </a>
      
      </div>

      <table class="table" style="background-color: #fff; border: 2px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">
      	<head>
      		<tr class="card-header">
      			<th>nom</th>
      			<th>niveau</th>
      			<th>action</th>
      		</tr>
      	</head>

      	<body>
      		
      		@foreach($module as  $modules)
      		<tr style="background-color: white;">
      			<td>{{$modules->nom}}</td>
      			<td>{{ $modules->niveau }} </td>
      			<td>
               <form action="{{url('admin/module_delete/'.$modules->id)}}" method="post" style="margin-top: 5px;">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit"  class="btn btn-default" style="color:#2A8CA9 ">suprimer</button>
              </form>
      			</td>
      		</tr>
      		@endforeach
      	</body>

      </table>

      

     </div>
  </div>

   <div class="modal fade" id="+"  >
                    <div class="modal-dialog" >
                        <div class="modal-content">

                            <div class="modal-body" style="background-color: #F0F0F0;">
                               <h3>Ajouter un module :</h3>
                                  
                      <form  action="{{url('admin/module_store')}}" method="post">
                           {{csrf_field()}}
                           <div class="form-group">
                             <label for="">Code module :</label>
                             <input type="text" name="code" class="form-control"
                             value="{{old('')}}" style="background-color: white;border: 1px solid #2A8CA9;">
                           </div>   
                           <div class="form-group">
                             <label for="">Nom module :</label>
                             <input type="text" name="nom" class="form-control"
                             value="{{old('')}}" style="background-color: white;border: 1px solid #2A8CA9;">
                           </div> 
                           <div class="row">
                             <label for="" style="margin-top: 45px;margin-left: 20px;">Niveau module :</label>
                                    <select class="custom-select" name="niveau" style="width: 180px;background-color: white;border:1px solid #2A8CA9;margin-top: 20px;margin-left: 10px;">
                                        
                                       <option value="l1">1er License</option>
                                        <option value="l2">2éme License</option>
                                        <option value="l3">3éme License</option>
                                        <option value="m1">1er Master</option>
                                        <option value="m2">2éme Master</option>
                                      </select>
                           </div> 
                           <div class="form-group">
                             <input type="submit" value="Ajouter" class="form-control btn " style="float: right;background-color: #2A8CA9 ;color: #fff;margin-top: 20px;">
                           </div>         
                        </div>
                    </div>
           </div>
       </div>

</div>   
@endsection      