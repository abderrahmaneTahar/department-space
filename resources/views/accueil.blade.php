<!DOCTYPE html>
<html>
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
    <style type="text/css">
      ::-webkit-scrollbar {
        width: 13px;
        background-color: #2A8CA9 ;
              }
      ::-webkit-scrollbar-thumb {
        width: 10px;
        background-color: #454540 ;
        opacity: 0.8;
      }
    </style>
    <!-- https://previews.123rf.com/images/conneldesign/conneldesign1502/conneldesign150200044/36486205-tall-bookshelf -->
</head>
<body>
	<div style="height: 672px;background:url(g.jpeg);">
		<div style="background-color: #0f0f0f; height:52px;width: 62px;opacity: 0.7; " >
		<a class="nav-item nav-link active" href="{{route('admin.login')}}">
			<img src="http://chittagongit.com//images/admin-login-icon/admin-login-icon-2.jpg" style="height: 55px;width:60px;margin-top: -11px;margin-left: -17px;border-top-right-radius: 5%;border-bottom-right-radius: 5%;">
		</a></div>
    <nav class="navbar navbar-expand-lg " style="opacity: 0.88; background-color: #0f0f0f;margin-left: 62px;margin-top: -52px;">
  <a class="navbar-brand" href="#"><h3 style="font-weight: 300;color: #CEF0D4; font-family: 'Rouge Script', cursive; font-size: 25px; font-weight: normal; line-height: 18px; text-align: center; text-shadow: 2px 2px 3px #454454; ">Publications étude </h3></a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
 
    <div style="margin-left: 550px;">
    	@guest

    	<form method="POST" action="{{ route('login') }}">
          @csrf
          <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus placeholder="email" style="border-radius: 3%;border:1px solid #fff">

                       <!--         @if ($errors->has('email'))
                                <script type="text/javascript">  window.location.href = '{{route("pub")}}';</script>
                                    <span class="invalid-feedback">
                                        <strong>errour</strong>

                                    </span>
                                @endif  -->

        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password" style="margin-left: 10px;border-radius: 3%;border:1px solid #fff">

                         <!--       @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif  -->

    	
    	
    	<button type="submit" class="btn btn-sm" style="background-color: #fff;color: #2A8CA9;margin-top: -3px;margin-left: 10px;font-weight: 800;">connexion</button>
        </form>
        @else
        <div style="margin-left: 400px;"><a href="{{route('pub')}}" style=" text-decoration: none;"><h4 style="font-weight: 700;color: #fff;">entreé</h4></a>
        @endguest

    </div>
    </div>
  </div>
</nav>

  </div>
   <div class="container">

   	<div  style="margin-top: -520px;opacity: 0.75;background-color: #0f0f0f;padding: 20px;width: 450px;height: 350px;margin-left: 700px;border-radius: 5%;">
@if(count($errors))
<div class="container alert alert-danger " style="margin-left: -600px;" role="alert">
    <ul>
        @foreach($errors->all() as $message)
        <li>
           <h5 style="color: #000"> {{ $message }}</h5>
        </li>
        @endforeach
    </ul>
</div>
@endif
   	</div>
   	 <form method="POST" action="{{ route('register') }}" style="margin-top: -300px;margin-left: 700px;width: 500px;">
                        @csrf

                        <div class="form-group row">
                            <label style="color: #fff" for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    <!--            @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif  -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="color: #fff" for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required>

                     <!--           @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif  -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="color: #fff" for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                       <!--         @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif  -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="color: #fff" for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
   		

   </div>
<div style="margin-top: 230px;background-color: #000"><h1>kjezfqbhcjann;r:,rn:;</h1></div>
</body>
</html>