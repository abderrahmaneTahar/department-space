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
        background-color:  #2A8CA9;
              }
      ::-webkit-scrollbar-thumb {
        width: 10px;
        background-color: #454540 ;
        opacity: 0.8;

      }
    </style>
</head>
<body style="background-color: #4f4f4f;background:url(http://elgusanodeluz.com/wp-content/uploads/2018/05/pages-background-color-colors-for-web-excellent-design-page.jpg);background-repeat: no-repeat;
    background-attachment: fixed;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#2A8CA9;height: 70px;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <a class="nav-link" href="{{ route('accueil') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;">Accueil</h4></a>
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li></li>
                    <li><a class="nav-link" href="{{ route('adminIndex') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;"> etudiants Publications</h4></a></li>
                    <li><a class="nav-link" href="{{ route('profList') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;">Liste Ensignants</h4></a></li>
                    <li><a class="nav-link" href="{{ route('modules_index') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;">Liste Modules</h4></a></li>
                    <li><a class="nav-link" href="{{ url('admin/publications/admin_Publications') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;">Admin Publications</h4> </a></li>
                    <li><a class="nav-link" href="{{ route('admin_create') }}" style="float:left!important;"><h4 style="margin-left: 20px; color: #fff;font-family: serif;font-weight: 500;">Publier</h4></a></li>
                            
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"><h5 style="color: white;"> Login</h5></a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><h5 style="color: white;"> Register</h5></a></li>
                        @else
                            
                            
                            <!--<li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('admin_create') }}">
                                        Publier
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin_pub') }}">
                                        my publications
                                    </a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <h6 style="color:#1194F6;"> Logout </h6>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>-->
                                     <a  href="{{ route('logout') }}" style="text-decoration: none;" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <h3 style="margin-right: -70px; color: #fff;text-shadow: 1px 1px 2px #082b34; font-family: serif;font-weight: 500;">  Déconnexion </h3>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;text-decoration: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>


