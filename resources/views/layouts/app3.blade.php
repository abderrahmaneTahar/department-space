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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #2A8CA9;">
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
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                            <li><a class="nav-link" href="{{ route('profList') }}"><h5 style="color: white;"> Login</h5></a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><h5 style="color: white;"> Register</h5></a></li>
                        
                            
                            
                           
                        
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


