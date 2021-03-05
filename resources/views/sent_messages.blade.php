  
@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 35px;">
    <div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
        <div class="col-md-11" style="margin-top: -30px;">
            <a href="{{url('/messages/recived')}}"><h4 class="btn btn-default"  style="float: right; background-color: white; color: #005B8E;margin-bottom: 10px; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);font-weight: 500;">Messages reçus >></h4>
           </a>
          <h4 >Messages envoyés :</h4>
        <table class="table" style="background-color: #fff; border: 2px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);">

        <head>
          <tr class="card-header" style="background-color: #9FAfAf">
            <th style="color: #fff"><h5 >Envoyer par</h5> </th>
            <th style="color: #fff"><h5 >Date</h5></th>
            <th style="color: #fff"><h5 >Core du message</h5></th>
          </tr>
        </head>

        <body>

            @foreach($messages as $message)
            @if($message->read)
               <tr style="background-color: white;">
            @else
              <tr style="background-color: #F7F7F7;">
            @endif
          	 <td style="width: 150px;">
              <a href="{{url('/profile/'.$message->sender->id)}}" style="text-decoration: none;color: #000">
            	<img :src="'/storage/'.$message->sender->avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;">
            <h6 style="margin-left: 50px;margin-top: 13px;">{{$message->reciver->name}}</h6>	</a>
            </td>
            <td style="width: 100px;">
              <h6 style="margin-top: 13px;font-weight: 400;">
            	{{$message->created_at}}</h6>
            </td>
           
            <td>
              <h6 style="margin-top: 13px;font-weight: 400;">
              {{$message->body}}</h6>
            	
            </td>
           </tr>
          @endforeach

        </body>
           

      </table>
{!! $messages->render() !!}
          
    </div>

         </div>

    </div>
          
</div>
        
        
@endsection  
