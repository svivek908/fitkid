<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FitKid|admin</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
<link href="{{ asset('admin-assets/assets/css/default.css') }}" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="login-sidebar-background">
<section id="wrapper" class="login-register login-sidebar">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 text-center parallax-fade-top subscribe-bg">
        <div class="main-title on-dark text-center mb-0"> <a href="index.php" class="text-center db"><img src="{{ asset('images/logo.png') }}" alt="Home" style="width: 50%"> </a><br/>
         <!--  <div class="main-subtitle-bottom smaller mt-10">Welcome back!</div> -->
        </div>
          @if(session()->has('message'))
             <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>
   @elseif(session()->has('emessage'))
             <div class="alert alert-danger">
                 {{ session()->get('emessage') }}
             </div>
   @endif
        <form class="form-horizontal form-material" id="loginform" method="POST" action="admin_login">
        @csrf
          <div class="form-group mt-20">
            <div class="col-xs-12">
              <div class="input-group"> <span class="input-group-addon b-0  bg-primary" id="basic-addon4"><i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" value="{{ old('email',Cookie::get('admin_email'))}}" name="email" class="form-control" placeholder="Username/Email" required="">
                @if($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-xs-12">
              <div class="input-group"> <span class="input-group-addon b-0  bg-primary" id="basic-addon4"><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="password" name="password" value="{{ old('password',Cookie::get('admin_password')) }}" class="form-control" placeholder="Password" required="">
                 @if($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox checkbox-primary"> <span class="pull-left">
                <input id="remember" value="1" name="remember" type="checkbox" 
                {{ old('remember',Cookie::get('admin_remember')) ? 'checked' : '' }}>
                <label for="remember">Remember me</label>
                </span> <a href="forgot_password.html" class="pull-right"><i class="mdi mdi-lock"></i> Forgot your Password?</a> </div>
            </div>
          </div>
          <div class="form-group text-center mt-20">
            <div class="col-xs-12" style="padding: 30px;">
              <button class="btn btn-success btn-lg btn-block text-uppercase" type="submit">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
<script src="{{ asset('admin-assets/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script> 
<script src="{{ asset('admin-assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
<!-- Slimscroll JavaScript --> 
<script src="{{ asset('admin-assets/assets/js/jquery.slimscroll.js') }}"></script> 
<script src="{{ asset('admin-assets/assets/js/dropdown-bootstrap-extended.js') }}"></script> 
<script src="{{ asset('admin-assets/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script> 
<script src="{{ asset('admin-assets/assets/js/init.js') }}"></script> 
</body>
</html>