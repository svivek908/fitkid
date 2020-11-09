@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  <style type="text/css">
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
          <div class="section banner-page" data-background="{{asset('images/contacts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Forgot Password')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="index.html">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Forgot password')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
            <div class="container">
                <div class="row">
                        <div class="col-4 col-md-4">
                            <img src="{{asset('images/ff.png')}}" style="width: 100%;">
                        </div>
                    <div class="col-6 col-md-8" style="padding-top: 80px;">
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
                                        <input type="password" class="form-control" placeholder="{{ __('messages.Email Address')}}" required=""  name="email" >
                                        </div>
                                    </div>
                                </div>
                            
                               
                            
                           
 
                          
                            
                            <div class="form-group">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary disabled" style="pointer-events: all; cursor: pointer;">{{ __('messages.Forgot Password')}}</button>
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
    margin-bottom: 25px;
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