@extends('layouts.app')

@section('content')

<div class="container" id="app" style="margin-top: 35px;">
	 <div class="row justify-content-center" style="margin-top: 100px;margin-left: 180px;">
<h4 style="margin-bottom: 20px;margin-top: 7px;width: 100%;margin-left: 80px;">Des utillisateurs tu déja blocké :</h4>
    <div class="col-md-7" style="background-color: #F7F7F7; border: 2px solid #005B8E ;box-shadow: 0 2px 2px rgba(0,0.3,0.3,0.4);border-bottom-right-radius: 2%;border-bottom-left-radius:2%;  ">
       
         <table class="table">

        <body>
          
          
          <tr v-for="unfriend in unfriends" style="background-color: #F7F7F7;">
            
            <td ><img :src="'/storage/'+unfriend.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;"><h6 style="margin-top: 13px;">@{{unfriend.name}}</h6></td>
            <td>
              <a  class="btn" style="background-color: #005B8E;color: #fff" @click="id=unfriend.id,friending()">Unblock</a>
            </td>
          </tr>
          
        </body>

      </table>

          
    </div>
<h4 style="margin-left: 30px;margin-top: -45px">Bloquer un utillisateur :</h4>
       <div class="col-md-4 " style=" border: 0px solid ;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 2%;margin-left: 330px;padding: 10px;margin-top: 50px;position: absolute;width: 300px;" >
          
        <nav style="border: 2px solid #005B8E;border-radius: 2%;background-color: #f7f7f7" >
         <form class="form-inline">
           <div class="input-group">
              <div class="input-group-prepend">
               <h5 style="margin-top: 15px;margin-right: 10px;margin-left: 10px">@</h5>
              </div>
             <input type="text" class="form-control" placeholder="user you want to block" aria-label="Username" aria-describedby="basic-addon1"  style="background-color: #fff;width: 240px;"  v-model="friendsBox">
            </div>
         </form>
       </nav>
       <div  > 
       	<table  >
         <body> 
          <tr v-for="friend in friends" >
          <td>
            <img :src="'/storage/'+friend.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;">
                 <h6 style="margin-top: 10px;">@{{friend.name}}</h6>
          </td >
          <td style="margin-left: 10px;"><button  class="btn " style="background-color: #F7F7F7;margin-top: 5px;margin-bottom: 5px;margin-left: 15px;" @click="id=friend.id,unfriending()"> Bloquer </button></td>
          </tr> 
           </body>
         </table> 
       </div>

      </div>
	
    </div>
</div>


@endsection

@section('script')

<script>

 const app = new Vue ({

   el: '#app',
   
   data: {
      
      unfriends: {},
      friends: {},
      friendsBox: "",
      id: '',
      user: {!! Auth::user()->toJson() !!}

   },
   
   mounted() {

      this.getunfriends()

   },


   watch: {

   friendsBox: function() {

    
    if (this.friendsBox.length >= 4) {
      this.getfriends()
    }
    else  this.friends = {}
   }

   },
   methods: {

   	getunfriends() {
     axios.post('/api/friends/unfriends',{
        user: this.user_api,
        user_id: this.user.id
     })
          .then((response) => {
          	this.unfriends = response.data.data;
          })
          .catch(function (error) {
          	console.log(error);
          })
    },

    getfriends() {
      axios.post('/api/friends/friends', {
        api_token: this.user_api_token,
        user_id: this.user.id,
        friendsBox: this.friendsBox
        })
      .then((response) => {
         this.friends = response.data.data;
         
     })
      .catch(function (error) {
        console.log(error);
      })
    },

    unfriending() {
      axios.post('/api/friends/unfriend/'+this.id, {
        user: this.user_api_token,
        user_id: this.user.id
        })
      .then((response) => {
         this.unfriends = response.data.data1;
         this.friendsBox = "";

     })
      .catch(function (error) {
        console.log(error);
      })
    },

    friending() {
      axios.post('/api/friends/friend/'+this.id, {
        user: this.user_api_token,
        user_id: this.user.id
        })
      .then((response) => {
         this.unfriends = response.data.data1;
         
     })
      .catch(function (error) {
        console.log(error);
      })
    },


   },




 });
</script>

@endsection