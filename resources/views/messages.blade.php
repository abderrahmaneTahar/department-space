@extends('layouts.app')

@section('content')


<div class="container" id="app" style="margin-top: 100px;margin-left: 205px;">
   <div class="row justify-content-center">
       
  <div class="col-md-7" style="margin-right: 15px;">
     <div v-if="voire" style="border-radius: 2%;">
      <div v-if="inbox">
         <table class="table" style="background-color: #fff; border: 2px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);" >
  <a href="{{ url('/messages/recived') }}"><h4 class="btn btn-default"  style="float: right; background-color: white; color: #1194F6;margin-bottom: 10px;margin-top: -20px; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);font-weight: 500;color: #005B8E;">All messages >></h4></a>
          <head>
          <tr class="card-header" style="background-color: #9FAfAf">
            <th style="color: #fff"><h5 >Envoyer par</h5> </th>
            <th style="color: #fff"><h5 >Date</h5></th>
            <th></th>
          </tr>
        </head>
      
           
        <body> 
        <h4 >Inbox messages :</h4>         
          
          <tr v-for="inboxMessage in inboxMessages" style="background-color: white;">
            
            <td  style="width: 170px;"> 
              <img :src="'/storage/'+inboxMessage.sender.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;" @click="reciver_id = inboxMessage.sender.id,reciver_name = inboxMessage.sender.name,voire = 0,friendsBox = ''">
              <h6 style="margin-top: 13px;" @click="reciver_id = inboxMessage.sender.id,reciver_name = inboxMessage.sender.name,voire = 0,friendsBox = ''">@{{inboxMessage.sender.name}}</h6>
            </td>
            <td v-if="id != inboxMessage.id"><h6 style="margin-top: 13px;">@{{inboxMessage.created_at}}</h6></td>
            <td v-if="id != inboxMessage.id">
              <a  class="btn " @click="id = inboxMessage.id,road = inboxMessage.read,readed()" style="float:right!important;color: white;background-color: #005B8E">Lire</a>
            </td>
          
          <td v-if="id == inboxMessage.id" v-cloack ><h5>@{{inboxMessage.body}}</h5> </td>
          
           <td  v-if="id == inboxMessage.id">
            <a  class="btn " @click="reciver_id = inboxMessage.sender.id,reciver_name = inboxMessage.sender.name,voire = 0,friendsBox = ''" style="float:right!important;color: white;margin-bottom: 5px;margin-left: 5px;background-color: #005B8E">Répondé</a>
            <a  class="btn " @click="id = -1" style="float:right!important;color:#005B8E ;background-color: #f7f7f7">Cachée</a>

          </td>
        
          </tr>
          
        </body>
      </table>
      </div>
    <!--  <div v-else>
         <table class="table" >

          <head>
          <tr class="card-header">
            <th>Recevoir par :</th>
            <th>Date</th>
            <th></th>
          </tr>
        </head>

        <body>
         
          <tr v-for="sentMessage in sentMessages" style="background-color: white;">
            
            <td v-if="id != sentMessage.id" ><img :src="'/storage/'+sentMessage.reciver.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;"><h6 style="margin-top: 13px;">@{{sentMessage.reciver.name}}</h6></td>
            <td v-if="id != sentMessage.id"><h6 style="margin-top: 13px;">@{{sentMessage.created_at}}</h6></td>
            <td v-if="id != sentMessage.id">
              <a  class="btn btn-primary" @click="id = sentMessage.id" style="float:right!important;color: white;">read</a>
            </td>
          
          <td v-if="id == sentMessage.id" ><h5>@{{sentMessage.body}}</h5> </td>
           <td v-if="id == sentMessage.id"><h6 style="margin-top: 13px;">@{{sentMessage.created_at}}</h6></td>
           <td  v-if="id == sentMessage.id">
            <a  class="btn btn-danger" @click="id = -1" style="float:right!important;color: white;">back</a>
          </td>

          </tr>

        </body>

      </table>
      </div>-->
    </div>
      <div v-else>
        
         
          
        
        <h4 href="" class="btn btn-default" style="float: right; margin-bottom: 20px;  background-color: white;margin-left: 5px;color: #1194F6;margin-top: -20px; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);font-weight: 500;color: #005B8E;">Tous les messages >></h4>
          <h4 class="btn btn-default" style="color: #1194F6; margin-bottom: 20px; background-color: white;margin-top: -20px; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);font-weight: 500;color: #005B8E;" @click="voire = 1,inbox = 1"> < Boite reception</h4> 
        <div class="form-control">
          <h4 style="color: black;margin-bottom: 20px;">Messagerie : @{{reciver_name}}</h4>
           
          <textarea v-model="messageBox" class="form-control" style="margin-top: 10px; height: 170px;background-color:  white; border: 1px solid #005B8E;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 2%"></textarea>
          <button class="form-control btn " @click="postMessage()" style="margin-top: 15px; margin-bottom: 5px;float:right!important;background-color: #005B8E;color: #fff">envoyer</button>
         
        </div>
        
           
        
      </div>
          
    </div>

    <h4 style="margin-top: 10px;margin-bottom: 10px;margin-left: 10px;">Nouveau message :</h4>
    <div class="col-md-3 " style=" border: 0px solid ;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 2%;margin-left: 400px;padding: 10px;margin-top: 50px;position: absolute;width: 300px;" >
          
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
       <div > 
        <table >
          <body>
           <tr v-for="friend in friends" style="margin-top: 10px;">
            <td style="width: 200px;">
              <a @click="reciver_id = friend.id,reciver_name = friend.name,voire = 0 " style="margin-top: 10px;">
                <img :src="'/storage/'+friend.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;margin-right: 10px;">
                <h6 style="margin-top: 13px;font-weight: 500;"> @{{friend.name}}</h6>
              </a>
            </td>
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
	
 var app = new Vue ({

   el: '#app',
   
   data: {
      
      inbox: 1,
      inboxMessages: {},
      sentMessages: {},
      friendsBox: '',
      friends: {},
      reciver_id: '',
      id: '',
      road: 0,
      reciver_name: '',
      messageBox: '',
      voire: 1,
      read: 1,
      user: {!! Auth::user()->toJson() !!}

   },
   
   mounted() {

     this.inboxMessage();
     this.listen();
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

   	inboxMessage() {
     axios.post('/api/message/inbox',{
        api_token: this.user.api_token,
        user_id: this.user.id
     })
          .then((response) => {
          	this.inboxMessages = response.data;
          })
          .catch(function (error) {
          	console.log(error);
          })
    },
    readed() {
      if ( this.road != 1) {
      axios.get('/api/message/read/'+this.id)
          .catch(function (error) {
            console.log(error);
          })
      }
    },
   // sentMessage() {
   //  axios.post('/api/message/sent',{
   //     api_token: this.user.api_token,
   //     user_id: this.user.id
   //  })
   //       .then((response) => {
   //         this.sentMessages = response.data;
   //       })
   //       .catch(function (error) {
   //         console.log(error);
   //       })
   // },

    postMessage() {
      axios.post('/api/message/store/'+this.reciver_id, {
      	api_token: this.user.api_token,
      	user_id: this.user.id,
        body: this.messageBox
      	})
      .then((response) => {
         this.messageBox = '';

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

    listen() {
          Echo.channel('message'+this.user.id)
          .listen('newMessage', (message) => {
            this.inboxMessages.unshift(message.message);

            document.getElementById("newMessage").play()
            
          })


       
    }
   
   },

   


 });
</script>

@endsection