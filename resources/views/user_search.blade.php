@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;background-color: #fff; border: 5px solid #fff ;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 1%;">
		<div class="col-md-12">
			<div class="row">
	@foreach($users as $user)
	   <div class="col-md-3" style="margin-bottom: 10px;">
	<a href="{{url('/profile/'.$user->id)}}" style="text-decoration: none;color: #000">	<img src=" {{'/storage/'.$user->avatar }}" style="width: 175px; height: 175px; float: left; border-radius: 5%; margin-top: 20px;margin-right: 15px;margin-bottom: 10px;border:2px solid #005B8E;">
		<h5>{{$user->name}}</h5> </a>
	</div>
	
    @endforeach
    {!! $users->render() !!} 
    </div>
    </div>  
</div>
</div>

@endsection