@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  <style type="text/css">

    .form-group a {
    color: #fd4d40;
}
.pb-5, .py-5 {
    padding-bottom: 3rem!important;
    margin-bottom: 0;
}
      @media (min-width: 768px)
      {
        a.btn.btn-secondary
        {
            margin-left: 25%;
        }
      }
      .help-block.with-errors p {
    color: red;
}
  </style>

 <div id="contact">
        <div class="content-wrap pb-0">
          <div class="section banner-page" data-background="{{URL::ASSET('images/logins.png')}}" style="background-image: url(&quot;{{URL::ASSET('images/logins.png')}}&quot;);">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Login')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Login')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
            <div class="container">
                <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="{{asset('images/kid.png')}}" style="width: 100%;margin-top: -20px">
                        </div>
                        
                    <div class="col-12 col-md-8">
                        <div class="bg">
                       <!--  <h2 class="section-heading text-center mb-5" style="text-align: left!important;">
                            Login
                        </h2> -->
                           @if(session()->has('message'))
                                       <div class="alert alert-success">
                                           {{ session()->get('message') }}
                                       </div>
                             @elseif(session()->has('emessage'))
                                       <div class="alert alert-danger">
                                           {{ session()->get('emessage') }}
                                       </div>
                             @endif
                        <form class="form-contact" action="{{route('user_auth')}}" method="POST" id="loginform123">
                           @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="{{ __('messages.Email Address')}}" required=""  name="email" value="{{ old('email') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('email'))
                                              <p>{{ $errors->first('email') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="{{ __('messages.Password')}}" name="password" required="" value="{{ old('password') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('password'))
                                              <p>{{ $errors->first('password') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                               <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <p style="float: left;" class="yy">{{ __("messages.Don't have an account ??")}} <a href="{{url('user_register')}}" >{{ __('messages.Register here')}}</a></p>
                                      <p ><a class="forgot-link" href="{{url('/forgot_password')}}">{{ __('messages.Forgot your password?')}}</a></p>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary disabled btn4" style="pointer-events: all; cursor: pointer;">{{ __('messages.Login')}}</button>
                            </div>
                        </form>
                        

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<style>
  .content-wrap {
    padding-bottom: 80px!important; 
    margin-bottom: 80px;
}
.pb-0, .py-0
{
  padding: unset!important;
}


.bg {
    float: left;
    width: 100%;
    background-color: #f8f8f8;
    padding: 50px;
    margin-bottom: 20px;
}
</style>