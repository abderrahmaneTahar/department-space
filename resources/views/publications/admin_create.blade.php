@extends('layouts.app2')
 

@section('content')

@if(count($errors))
<div class="container alert " style="background-color: #2A8CA9;" role="alert">
	<ul>
		@foreach($errors->all() as $message)
		<li>
			{{ $message }}
		</li>
		@endforeach
	</ul>
</div>
@endif


<div class="container">
  <div class="row justify-content-center">
     <div class="col-md-9" style="background-color: #F7F7F7; border: 5px solid #f7f7f7;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 1%;margin-top: 20px;">

     	<form enctype="multipart/form-data" action="{{url('admin/publications/store')}}" method="post">
     		{{csrf_field()}}
     		<div class="form-group">
     			<label for="">titre :</label>
     			<input type="text" name="titre" class="form-control"
     			value="{{old('titre')}}" style="background-color: white;border: 1px solid #2A8CA9;">
     		</div>

     		<div class="form-group">
     			<label for="">body :</label>
     			<textarea name="body" class="form-control" style="height: 100px;background-color: white;border: 1px solid #2A8CA9;">{{old('body')}}</textarea>
     		</div>

     		<div class="form-group">
     			<label for="">add a file :</label>
     			<input type="file" name="file" class="btn btn-default " value="{{old('file')}}">
     		</div>

     		<div class="form-group">
     			<label for=""></label>
     			<input type="submit" value="Publier" class="btn" style="float: right;background-color: #2A8CA9 ;color: #fff;margin-right: 20px;margin-bottom: 20px;width: 100px;">
     		</div>
     	</form>
     </div>
 </div>
</div>

@endsection

