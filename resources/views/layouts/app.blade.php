<!-- php -S localhost:8000 -t public/ -->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/storage/avatars/hub.ico" />
    <title>App</title>

    <!-- Styles -->
    <link href="{{ asset('css/theme4.css') }}" rel="stylesheet">
    <style type="text/css">
      ::-webkit-scrollbar {
        width: 13px;
        background-color: #454540 ;
              }
      ::-webkit-scrollbar-thumb {
        width: 10px;
        background-color: #2A8CA9 ;
        opacity: 0.8;
      }
    </style>
</head>
<body style="background-color: #efefef;background:url(http://elgusanodeluz.com/wp-content/uploads/2018/05/pages-background-color-colors-for-web-excellent-design-page.jpg);background-repeat: no-repeat;
    background-attachment: fixed;">
    <div id="app">
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#2A8CA9;z-index:1;position: fixed; width: 1500px;height: 50px;opacity: 0.9;background: url(http://wallpaperhdzone.com/wp-content/uploads/2017/09/1920x1080-color-background-surface-solid-wallpaper-wpt100934.jpg);"> <!-- https://wallpaperhdzone.com/wp-content/uploads/2017/09/1920x1080-color-background-surface-solid-wallpaper-wpt100934.jpg -->
            <div class="container">
                <a class="navbar-brand" href="{{route('pub')}}">
                  <h3 style="font-weight: 300;margin-left: -187px;color: #CEF0D4; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal; line-height: 18px; text-align: center; text-shadow: 1px 1px 2px #082b34; ">Publications étude</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <a href="{{route('accueil')}}" style="margin-top: 10px; margin-left: 30px;text-decoration: none;"><h3 style="color: #fff;font-family: serif;font-weight: 500;text-shadow: 2px 2px 3px #082b34;">Accueil</h3></a>
                    <a href="{{route('pub')}}" style="margin-top: 10px; margin-left: 25px;text-decoration: none;"><h3 style="color: #fff;font-family: serif;font-weight: 500;text-shadow: 2px 2px 3px #082b34;">Publications</h3></a>
          <form class="form-inline" style="margin-left: 60px;" action="{{route('search')}}" method="post">
            {{csrf_field()}}
           <div class="input-group">
         <!--   <div class="input-group-prepend btn btn-sm" style="margin-top: 1px;height: 32px;background-color: #2f8eAd;">  
               <span class="input-group-text" id="basic-addon1"><h4 style="color: #fff;">recherche :</h4></span>
              </div> -->
            <select class="custom-select" style="width: 3px;margin-top: 1px;height: 32px;background-color: white;border:0px;" name="select">
                      <option value="persone">persone</option>
                      <option value="publication">publication</option>
            </select>
             <input type="text" class="form-control" placeholder="  user you want to block"   name="search" style="background-color: #fff;width: 450px;height: 10px;margin-top: 1px;">
             <div class="input-group-prepend btn btn-sm" style="margin-top: 1px;height: 32px;background-color: #2f9fAf;width: 45px;">
                
               <button type="submit"  id="basic-addon1" style="background-color:#2f8eAd;margin-top: -5px; position: fixed;z-index: 1;opacity: 0;width: 45px;margin-left: -7px;"><h1 style="color: #fff;margin-top: -9px;">Ԛ</h1></button>
               <img src="http://www.novabirthcoalition.com/wp-content/uploads/2016/02/571011-3-1.png" style="width: 28px;height: 25px;">
              </div>
            </div>
         </form>
                    
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}" style="text-decoration: none;"><h5 style="color: white;"> Login</h5></a></li>
                            <li><a class="nav-link" href="{{ route('register') }}" style="text-decoration: none;"><h5 style="color: white;"> Register</h5></a></li>
                        @else
                            
                        
                                    <a  href="{{ route('logout') }}" style="text-decoration: none;" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <h3 style="margin-top: 11px; color: #fff;text-shadow: 2px 2px 3px #082b34; font-family: serif;font-weight: 500;">  Déconnexion </h3>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;text-decoration: none;">
                                        @csrf
                                    </form>
                               
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
@auth
            <div>
                <div class="col-md-2" style="z-index:1;background-color: #484848;background: url(http://performancedrive.com.au/wp-content/uploads/2011/07/background.jpg); margin-top: -75px;height: 625px;position: fixed; border: 0px solid #484848 ;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-bottom-right-radius: 2%;border-top-right-radius: 0%;opacity: 0.99; ">

               <a href="{{route('profile')}}" style="text-decoration: none;">    <div class="row justify-content-center" >
                        <img src=" {{'/storage/'.Auth::user()->avatar }}" style="width: 135px; height: 135px; float: left; border-radius: 50%; margin-top: 15px;margin-right: 15px;">
                    </div class="row justify-content-center">
                    <div class="row" ><h5 style="color: #fff;margin-top: 25px;margin-left: 50px;"> {{Auth::user()->name}} </h5> </div></a> 
                    <div class="row" style="margin-top: 30px;margin-left: -35px;">

                      <ul style="margin-top: 10px;">
                        <hr style="background-color: #2A8CA9;width: 198px">
                        <li style="list-style: none;" ><a href="{{route('profile')}}"><h5  style="color: #fff;margin-top: 15px;font-weight:200;opacity:1 ;">Mon Porfile</h5></a></li >
                        <hr style="background-color: #2A8CA9;width: 198px">
                        <li style="list-style: none;" ><a href="{{route('my_pub')}}"><h5  style="color: #fff;margin-top: 15px;font-weight:200;opacity:1 ;">Mes Publications</h5></a></li >
                        <hr style="background-color: #2A8CA9;width: 198px">
                        <li style="list-style: none;" ><a href="{{route('messages')}}"><h5  style="color: #fff;margin-top: 15px;font-weight:200;opacity:1 ;">Boite Reception</h5></a></li >
                            <hr style="background-color: #2A8CA9;width: 198px">
                        <li style="list-style: none;" ><a href="{{route('recived')}}"><h5  style="color: #fff;margin-top: 15px;font-weight:200;opacity:1 ;">Tous Messages</h5></a></li ">
                            <hr style="background-color: #2A8CA9;width: 198px">
                        <li style="list-style: none;" ><a href="{{route('friends')}}"><h5  style="color: #fff;margin-top: 15px;font-weight:200;opacity:1 ;">Liste des Blockés</h5></a></li>
                            
                            <hr style="background-color: #2A8CA9;width: 198px">
                      </ul>
                    </div>
                </div>@yield('content')</div>
            
            
         <!--   <div class="row" style="background-color: #1194F6;margin-top: 120px;position: fixed; border: 5px solid #1194F6;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 20%;width: 120px;">
            <div class="col-md-2" style="margin-left: 5px;">
               <div >
                    <a href="#envoyer" data-toggle="modal"  style="margin-top: 20px;text-decoration: none;" ><h5 style="color: white;"> envoyer</h5></a>
               </div>
               <div style="margin-top: 20px;">
               
                    <a href="#pubiler" data-toggle="modal"  style="margin-top: 40px;text-decoration: none;" >
                        <h5 style="color: white;"> publier</h5></a>
               </div>
               <div style="margin-top: 20px;">
                    <a href="#profiles" data-toggle="modal"  style="margin-top: 40px;text-decoration: none;" > <h5 style="color: white;">profiles</h5></a>
               </div> 
            </div> </div>-->
            
            
           <div id="khal3a"> 
            <div class="modal fade" id="envoyer" >
                    <div class="modal-dialog"  style="border: 2px solid #005B8E;border-radius: 2%;margin-top: 150px;margin-left: 550px;" >
                        <div class="modal-content"  style="border: 2px solid #005B8E;border-radius: 2%;" >
                          <div class="modal-body" style="background-color: #f7f7f7;">
                            

         <form class="form-inline">
           <div class="input-group" style="border-radius: 2%;border: 1px solid #005B8E;border-radius: 2%;background-color: #f7f7f7">
              <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1" style="font-weight: 700;margin-left: 7px;">Email  : </span>
              </div>
             <input type="text" class="form-control" placeholder="Entrer un email" aria-label="Username" aria-describedby="basic-addon1"   v-model="email" style="width: 409px;background-color: #fff">
            
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
           <div class="modal fade" id="publier" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body" style="background-color: #F0F0F0">
                                
                            </div>
                        </div>
                    </div>
           </div>
           <div class="modal fade" id="profiles" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body" style="background-color: #F0F0F0">
                                
                            </div>
                        </div>
                    </div>
           </div>
           </div>
            <audio id="newMessage" src="{{ asset('audio/noty.mp3') }}"></audio>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')

    <script>
    
     const ap = new Vue ({
      el: '#khal3a',
      data: {
        user: {!! Auth::user()->toJson() !!},
         email:'',
         sms: '',

      },

   methods: {

    emailEnvoie() {
      axios.post('/api/message/email', {
        api_token: this.user_api_token,
        user_id: this.user.id,
        sms: this.sms,
        email: this.email,
        })
      .then((response) => {
         this.sms = '';
         
     })
      .catch(function (error) {
        console.log(error);

      })
    },
   },
      
      });

</script>

   
    @endauth
</body>
</html>


