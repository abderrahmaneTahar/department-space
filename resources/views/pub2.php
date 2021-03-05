@extends('layouts.app')
 
@section('content')

 <div id="app">


    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
        
               <nav class="navbar navbar-light bg-light justify-content-between" style="margin-bottom: 25px;">
                 
                    <select v-model="fillter" class="custom-select" style="width: 180px;">
                      <option value="0">filter by :</option>
                      <option value="1">1er License</option>
                      <option value="2">2éme License</option>
                      <option value="3">3éme License</option>
                      <option value="4">1er Master</option>
                      <option value="5">2éme Master</option>
                      <option value="6">Persone</option>
                    </select>

                 <form v-if="fillter == 6" class="form-inline">
                   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                 </form>

                 <div v-else class="btn-group">
                       <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Modules
                       </button>
                       <div v-if="fillter == 1" class="dropdown-menu">
                         <a class="dropdown-item" href="#">1er License</a>
                         <a class="dropdown-item" href="#">2éme License</a>
                         <a class="dropdown-item" href="#">3éme License</a>
                         <a class="dropdown-item" href="#">1er Master</a>
                         <a class="dropdown-item" href="#">2éme Master</a>
                       </div>

                       <div v-else class="dropdown-menu">
                         <a class="dropdown-item" href="#">Action</a>
                         <a class="dropdown-item" href="#">Another action</a>
                         <a class="dropdown-item" href="#">Something else here</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Separated link</a>
                       </div>

                     </div>

               </nav>

            <div class="card" v-for="post in posts" style="margin-bottom: 15px;">
              
              
                <div class="card-header " style="background-color: white;"> <img :src="'/storage/'+post.user.avatar" style="width: 35px; height: 35px; float: left; border-radius: 50%; margin-right: 5px;margin-top: 5px;"><h6 style="color: black;margin-top: 5px;">@{{post.user.name}} </h6><h6 style="color: #0077AC;">@{{post.updated_at}}</h6></div>
              
                <div class="card-body">
                  <h5>@{{post.titre}} :</h5>
                   <p> @{{post.body}}</p> 
                    
                      <div v-if="post.file"  style="float:right!important;">

                       <div  style="float:right!important;">
                       <a class="pull-bottom" :href="'/storage/'+post.file" :download="post.file">
                         <button type="button" class="btn btn-sm btn-outline-primary my-2 my-sm-0" style="margin-top: 5px;">
                           download
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

<script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>

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
        fillter : '0',
        Modules : '',
        userNam : '',
        
      },

      watch: {

   fillter: function() {

    
       if (this.fillter == 1 or this.fillter == 2  or this.fillter == 3  or this.fillter == 4 or this.fillter == 5  ) {
         this.getModules()
        }
       }
      },

      methods: {

        getModules() {

          axios.get('/api/Modules/'+this.fillter)
            .then((response) => {
              this.Modules = response.data;
              })
            .catch(function (error) {
              console.log(error);
              })
        },

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

   //     download() {

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

