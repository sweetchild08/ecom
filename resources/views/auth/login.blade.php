<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bubbly - Boootstrap 4 Admin template by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="bubly/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="bubly/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="bubly/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="bubly/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="bubly/img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="bubly/img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Bubbly Dashboard</h1>
            <h2 class="mb-4">Welcome back!</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            <form id="loginForm" action="{{ route('login') }}" method="post" class="mt-4">
                @csrf
              <div class="form-group mb-4">
                <input id="username" value="{{ old('username') }}" type="text" name="username" placeholder="Username" class="form-control border-0 shadow form-control-lg @error('username') is-invalid @enderror"> 
                
                @error('username')
                    <div class="invalid-feedback ml-3"><strong>{{ $message }}</strong></div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <input id="password" type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback ml-3 mb-4"><strong>{{ $message }}</strong></div>
                @enderror
              </div>
              <div style="text-align:right">
                @if (Route::has('password.request'))
                  <a class="btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                @endif
                @if (Route::has('register'))
                  <a class="btn-link" href="{{ route('register') }}">Register</a>
                @endif
              </div>
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                  <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                  <label for="customCheck1" class="custom-control-label">Remember Me</label>
                </div>
             
              </div>
              <div class="row justify-content-between">
                @if (Route::has('register'))
                <div style="flex:0 0 25%" class="ml-3"><button onclick="window.location.href='{{ route('register') }}'" class="btn btn-success shadow" type="button">Register</button></div>
                @endif
                <div style="flex:0 0 25%" class="mr-3"><button type="submit" class="btn btn-primary shadow">Log in</button></div>
              </div>
            </form>
          </div>
          <example-component></example-component>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a> & Your company</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <div id="app"></div>
    <!-- JavaScript files-->
    <script src="bubly/vendor/jquery/jquery.min.js"></script>
    <script src="bubly/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="bubly/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="bubly/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="bubly/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="bubly/js/front.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>