@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
		<div class="col-md-8 col-md-offset-1" style="background-color: white; box-shadow: 0 2px 2px rgba(0.3,0.3,0.3,0.5);border-radius: 2%;margin-top: -10px; ">
            
			<div class="row" style="background-color: #2f8eAd;">
             <img src="/storage/{{$user->avatar}}" style=" margin-left: 250px; margin-top: 20px;margin-bottom: 20px; width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;border: 5px solid #2f8eAd;box-shadow: 0 2px 2px rgba(0,0,0,0.3); ">
            </div>
			<div class="row" style="background-color: #2f8eAd; box-shadow: 0 2px 2px rgba(0.3,0.3,0.3,0.5);"><h4 style="margin-left: 265px;color: #fff">{{$user->name}}</h4>
            <hr >
        </div>

			

			
		
		<div  >
			<div class="col-md-12 col-md-offset-1" style="margin-top: 20px;">
				
        <div>
         <label>@if($user->est_Prof == 0)<h5>niveau :</h5>@else<h5>niveau etudié:</h5>@endif</label>
         <span>{{$user->niveau}}</span>
     </div>
     <div>
         <label><h5>tel :</h5></label>
         <span>{{$user->tel}}</span>
     </div> 
     <div>
         <label><h5>social media :</h5></label>
         <span>{{$user->social_media}}</span>
     </div> 
     <div>
         <label><h5>discribé vous :</h5></label>
         <p>{{$user->description}} </p>

        </div>

        @if($user->id == Auth::user()->id)
        <a href="#edit" data-toggle="modal" class="btn btn-sm" style="float: right;margin-bottom: 20px;margin-top: 20px;background-color: #2f8eAd;color: #fff" > editer profile</a>
        @else
        <a href="#envoyerM" data-toggle="modal" class="btn btn-sm" style="float: right;margin-bottom: 20px;margin-top: 20px;background-color: #2f8eAd;color: #fff" >envoyer message</a>
        @endif
        </div>
        </div>

				<div class="modal fade" id="edit" >
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-body" style="background-color: #F0F0F0">
								 
            
        <form enctype="multipart/form-data" action="/profile" method="post" style="margin-top: 30px;">
            {{csrf_field()}}
               
     		<div class="form-group">
     			@if($user->est_Prof != 1)<label for="">niveau :</label>@else<label for="">niveau étudié :</label>@endif
     			<input type="text" name="niveau" class="form-control"
     			style="background-color: white;border:1px solid #2f8eAd;" value="{{$user->niveau}}">
     		</div>

            <div class="form-group">
     			<label for=""> tel :</label>
     			<input type="text" name="tel" class="form-control"
     			style="background-color: white;border:1px solid #2f8eAd;" value="{{$user->tel}}">
     		</div>
            
             <div class="form-group">
     			<label for="">social media :</label>
     			<input type="text" name="social_media" class="form-control"
     			style="background-color: white;border:1px solid #2f8eAd;" value="{{$user->social_media}}">
     		</div>

     		<div class="form-group">
     			<label for="">discribe vous :</label>
     			<textarea name="description" class="form-control" style="height: 100px;background-color: white;border:1px solid #2f8eAd;">{{$user->description}}</textarea>
     		</div>

            <label for="">photo du profile :</label>
                <input type="file" name="avatar"  class="btn btn-default" style="background-color: #Fff;">
     		
     		<div class="form-group">
     			<label for=""></label>
     			<input type="submit" value="confirmer" class="form-control btn" style="background-color: #2f8eAd;color: #fff;">
     		</div>

     	</form>

		
	</div>

							</div>
						</div>
					</div>
		
	</div>
	</div>
    </div>

     <div class="modal fade" id="envoyerM" >
                    <div class="modal-dialog"  style="border: 2px solid #005B8E;border-radius: 2%;margin-top: 150px;margin-left: 550px;" >
                        <div class="modal-content"  style="border: 2px solid #005B8E;border-radius: 2%;" >
                          <div class="modal-body" style="background-color: #f7f7f7;">
                            

         <form class="form-inline">
           <div class="input-group" style="border-radius: 2%;border: 1px solid #005B8E;border-radius: 2%;background-color: #f7f7f7">
              <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1" style="font-weight: 700;margin-left: 7px;">Email  : </span>
              </div>
             <input type="text" class="form-control" value="{{$user->email}}" aria-label="Username" aria-describedby="basic-addon1"   v-model="email" style="width: 409px;background-color: #fff">
            
         </form>
       
       
                          </div>
                            
                            
                                  
        <div class="form-control">
          
           
          <textarea v-model="sms" class="form-control" style=" height: 170px;background-color:  white;border: 1px solid #005B8E;border-radius: 2%;"></textarea>
          <button class="form-control btn "  style="background-color: #2A8CA9;color: #fff; margin-top: 10px; margin-bottom: 5px;float:right!important;" @click="emailEnvoie()">envoyer</button>
                            </div>
                        </div>
                    </div>
           </div>
       </div>
</div>

@endsection

@section('script')

<script>
	
	 const app = new Vue ({

      data: {

      user:	{!! $user !!},
      },
      
	  });

</script>


@endsection