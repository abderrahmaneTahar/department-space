@extends('layouts.app')
 
@section('content')

 <div id="app">


    
    <div class="container">
     <div class="col-md-1" style="background-color: #2A8CA9; margin-top: 100px; margin-left: 1193px;position: fixed;z-index: 1;margin-right: -10px;border: 7px solid #2A8CA9 ;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 10%; ">
      <div class="row">
        <a href="#envoyer" data-toggle="modal" >
       <img src="https://www.shareicon.net/download/2015/10/03/111634_email.ico" style="height: 30px;width: 30px; border: 2px solid #fff;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 50%;background-color: #fff;margin-left: -3px;">
     </a>
      </div>
      <div class="row" style="margin-top: 10px;height: 30px;width: 30px; border: 2px solid #fff;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 50%;background-color: #fff;margin-left: -18px;">
        <a href="{{route('create')}}" >
       <img src="https://www.shareicon.net/download/2016/07/08/117243_edit_512x512.png" style="height: 20px;width: 20px; border: 0px solid #fff;border-radius: 30%;margin-top: 3px;margin-left: 3px;">
     </a>
      </div>

    <!-- <div class="row" style="margin-top: 1px;">
       <a href="{{route('create')}}" style="height: 30px;width: 30px; border: 2px solid #fff;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 50%;background-color: #fff;margin-top: 15px;text-decoration: none;margin-left: -3px;"> 
        <h2 style="margin-left: 4px;margin-top: -4px;color:#000 ; ">+</h2>
     </a>
     </div> -->
   </div>
    <div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
        <div class="col-md-10">
        
                 
               <h3 style="color: #0f0f0f;font-family: serif;font-weight: 500;">Filltré par :</h3>
                    <select v-model="fillter" class="custom-select" style="width: 180px;background-color: white;margin-bottom: 50px;color: #2A8CA9;margin-top: -55px;border:1px solid #2A8CA9;margin-left: 120px">
                      <option value="ALL">Tous les Publications</option>
                      <option value="l1">1er License</option>
                      <option value="l2">2éme License</option>
                      <option value="l3">3éme License</option>
                      <option value="m1">1er Master</option>
                      <option value="m2">2éme Master</option>
                      
                    </select>

              <!--   <form v-if="'0' == 'ALL' || fillter == '6'" class="form-inline" style="float: right;margin-bottom: 25px;background-color: white;margin-top: -50px;">
                   <input class="form-control mr-sm-2" type="search" placeholder="Search name" aria-label="Search">
                   <button  class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                 </form> -->

                 <div v-if="fillter != 'ALL' " class="btn-group" style="margin-bottom: 25px;background-color: white;margin-top: -80px;border:1px solid #2A8CA9;border-radius: 5%;margin-right: 270px;">
                       <button v-if="fillter != 6" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @{{modul}} 
                       </button>
                       <div  class="dropdown-menu">
                         <a class="dropdown-item" v-for="module in modules" @click="modul = module.nom ,getModules(),completed = false" href="#">@{{module.nom}}</a>
                        
                       </div>
                     </div>

               

            <div class="card" v-for="post in posts" style="margin-bottom: 15px;border: 5px ;border:1px solid #484848;box-shadow: 0 2px 2px rgba(0,0.3,0.2,0.4);background-color: #fff">
              
                <div v-if="post.user_id == null" class="card-header " style="background-color: #fff;border: 0px #fff;">
                  
                  <h5 style="font-weight: 300;color: #000; font-family: 'Rouge Script';  font-weight: normal; line-height: 18px;  text-shadow: 1px 1px 2px #454454;">Admin </h5><h6 style="color: #0077AC;">@{{post.updated_at}}</h6>
                  
                </div>
                  <div v-else class="card-header " style="background-color: white;">
                    <h5 style="float: right;">@{{post.module}}</h5>
                 <img :src="'/storage/'+post.user.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;">
                 <h6 v-if="post.user.est_Prof == 1" style="color: black;margin-top: 5px;">@{{post.user.name}} (Ensignant) </h6> 
                 <h6 v-else style ="color: black;margin-top: 5px;">@{{post.user.name}} </h6>
                 <h6 style="color: #0077AC;">@{{post.updated_at}}</h6></div>
              
                <div class="card-body">
                  <h5>@{{post.titre}} </h5>
                   <p> @{{post.body}}</p> 
                    
                      <div v-if="post.file"  style="float:right!important;">

                       <div  style="float:right!important;margin-top: 20px;">
                        @{{post.file}}
                       <a class="pull-bottom" :href="'/storage/'+post.file" :download="post.file">
                         <button type="button" class="btn btn-sm btn-primary my-2 my-sm-0" style="margin-bottom: 20px;margin-left: 5px;background-color: #2A8CA9;">
                           telecharger
                         </button>
                        </a>
                      </div>

                      </div>
                   
                </div>
                              
             </div>
             </div>
          </div>

    </div>
</div>
        
        <div class="text-center" v-cloak v-if="completed" style="margin-top: 20px;">
          <h5>auccun autre publications!</h5>
        </div>

      </div>
    </div>
    <hr>
  </div>     

@endsection

@section('script')

<!--<script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script> -->

<script type="text/javascript">
  window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}

  var app = new Vue({
      el: '#app',
      data: {
        posts : {!! $posts !!},
        completed : false,
        progress : false,
        fillter : 'ALL',
        modules : {},
        userNam : '',
        modul : 'Modules',
        scrollOn : '',
        
      },

      watch: {

   fillter: function() {

    
       if (this.fillter != 6 ) {
         this.getModulesNam();
         this.getNiveau();
         this.modul = 'Modules';
        }

        }
      },

      methods: {

        getModulesNam() {

          axios.get('/api/modules/'+this.fillter)
            .then((response) => {
              this.modules = response.data.data;
              })
            .catch(function (error) {
              console.log(error);
              })
        },

        getModules() {

          axios.get('/api/parModules/'+this.modul)
            .then((response) => {
              this.posts = response.data;
              this.scrollOn = 'module';
              })
            .catch(function (error) {
              console.log(error);
              })
        },

        getNiveau() {
           if (this.fillter == 'ALL')
           {
           location.reload(true);
           } else{
          this.completed = false;
          axios.get('/api/niveau/'+this.fillter)
            .then((response) => {
              this.posts = response.data;
              this.scrollOn = 'niveau';
              })
            .catch(function (error) {
              console.log(error);
              })
        }},

        getPersonePub() {

           axios.post('/api/personePubs',{
            userNam : this.userNam
           })
           .then((response) => {
              this.posts = response.data;
              })
            .catch(function (error) {
              console.log(error);
              })

        },
       
        getPosts: function(){
          
          if (history.pushState) {
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            window.history.pushState({path:newurl},'',newurl);
          }

          $.LoadingOverlay("show");
          this.posts = "";
          self = this;
          
          axios.post(newurl)
               .then(function (response) {
                  $.LoadingOverlay("hide"); 
                  self.posts = response.data;
                  self.completed = false;
                })
               .catch(function (error) {
                    console.log(error);
                });

        },
        infiniteScroll: function(){
          var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname ;

          self = this;
          
          if (!this.completed &&  !this.progress) {
            this.progress = true
           
            axios.post(newurl,{
                  offset: self.posts.length ,
                  scrollOn: this.scrollOn,
                  niveau: this.niveau,
                  module: this.modul,
                  fillter: this.fillter,
                 })
                 .then( function(response) {
                    if (response.data.length) {
                      self.posts = self.posts.concat(response.data);
                      self.progress = false;  
                    } else {
                      self.progress = false;  
                      self.completed = true;
                    }
                  })
                 .catch(function (error) {
                    console.log(error);
                  });
          }

        },

   //     download()  {

   //     axios.get('/api/publications/download/'+this.path) 
   //     .catch(function (error) {
   //                 console.log(error);
   //               });
    //      } 
        
      

      },

      
      mounted:function(){
        window.addEventListener('scroll', this.infiniteScroll);
     },
  });
</script>

@endsection

