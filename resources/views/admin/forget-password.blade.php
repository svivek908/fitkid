<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>shaymarh.com|admin</title>
<link rel="shortcut icon" href="{{ asset('admin-assets/assets/img/favicon/favicon.png') }}">
<link rel="icon" href="{{ asset('admin-assets/assets/img/favicon/favicon.png') }}" type="image/x-icon">
<link href="{{ asset('admin-assets/assets/css/default.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="login-sidebar-background">
<section id="wrapper" class="login-register login-sidebar">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 text-center parallax-fade-top subscribe-bg">
        <div class="main-title on-dark text-center mb-0"> <a href="index.php" class="text-center db"><img src="{{ asset('admin-assets/assets/img/logo.png') }}" alt="Home" style="width: 50%"> </a><br/>
          <div class="main-subtitle-bottom smaller mt-10">Welcome back!</div>
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
        <form method="POST" action="{{ route('password.email') }}">
        @csrf
          <div class="form-group mt-20">
            <div class="col-xs-12">
              <div class="input-group"> <span class="input-group-addon b-0  bg-primary" id="basic-addon4"><i class="mdi mdi-account"></i></span>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Username/Email">
                @if($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
                @endif
              </div>
            </div>
          </div>
        <div class="form-group mt-20">
        </div>
          <div class="form-group text-center mt-20">
            <div class="col-xs-12">
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