@extends('layouts.app')

@section('content')

<div class="container">
	 <div class="row justify-content-center">
       <div class="col-md-4 div div-light bg-light"><nav class="navbar navbar-light bg-light">
         <form class="form-inline">
           <div class="input-group">
              <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">@</span>
              </div>
             <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
         </form>
       </nav>
       <div  style="margin-left: 40px; margin-top: 20px; margin-bottom: 20px;   "> 
       	<ul>
	      <li> dfdg <button class="btn btn-primary"> add </button> </li>
       </ul>
      </div>

</div>
	<div class="col-md-8">
   
         <table class="table">

      	<body>
      		
      		@foreach($friend as  $friends)
      		<tr>
      			<td>avatar</td>
      			<td>pokk</td>
      			<td>^pikjm </td>
      			<td>
      				<a href="{{ url('admin/'.$modules->id) }}" class="btn btn-danger">Supprimer</a>
      			</td>
      		</tr>
      		@endforeach
      	</body>

      </table>

        	
    </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	
 const app = new Vue ({

   el: '#app',
   
   data: {
      
      inbox: 0,
      messages: {},
      messageBox: '',
      id: '2',
      user: {!! Auth::user()->toJson() !!}

   },

   methods: {

   	getMessages() {
     axios.post('/api/messages/'+this.id,{
        api_token: this.user.api_token,
        user_id: this.user.id
     })
          .then((response) => {
          	this.friends = response.data
          })
          .catch(function (error) {
          	console.log(error);
          });
    },

    postMessages() {
      axios.post('/api/friend/'+this.id, {
      	user_id: this.user.id
      	})
      .then((response) => {
         this.messages = response.data;
         this.messageBox = '';
     })
      .catch(function (error) {
      	console.log(error);
      })
    }


   },




 });
</script>

@endsection