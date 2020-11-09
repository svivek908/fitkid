@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  <style type="text/css">
    .content-wrap {
    padding: 80px 0;
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
      .form-label
      {
    color: #000;
    font-weight: 600;
      }
      .form-group a {
    color: #fd4d40;
}
form.form-contact {
    margin-top: 5%;
}

.bg {
    float: left;
    width: 100%;
    background-color: #f8f8f8;
    padding: 50px;
    margin-bottom: 20px;
}
  </style>

 <div id="contact">
        <div class="content-wrap pb-0" style="">
<div class="section banner-page" data-background="{{URL::ASSET('images/registers.png')}}" style="background-image: url({{URL::ASSET('images/registers.png')}});">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Register')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.register')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
            <div class="container" style="margin-top:30px;">

                <div class="row">
                    <div class="col-12 col-md-5">
                      
                        <img src="{{asset('images/kid.jpg')}}" style="width: 100%;">
                        @if(session()->has('message'))
                                       <div class="alert alert-success">
                                           {{ session()->get('message') }}
                                       </div>
                             @elseif(session()->has('emessage'))
                                       <div class="alert alert-danger">
                                           {{ session()->get('emessage') }}
                                       </div>
                             @endif
                           </div>
                           <div class="col-12 col-md-7">
                              <!-- <h2 class="section-heading text-center mb-5" style="text-align: left!important;"> -->
                         
                         <div class="bg">
                             
                        <form class="form-contact" action="{{route('create')}}" method="POST">
                           @csrf
                            <div class="row">
                           
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('messages.Name')}}</label>
                                        <input type="text" class="form-control" id="name" placeholder="{{ __('messages.Enter student name')}}" required=""  name="name" value="{{ old('name') }}">
                                    
                                        <div class="help-block with-errors">
                                              @if($errors->has('name'))
                                              <p>{{ $errors->first('name') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Email')}}</label>
                                        <input type="email" class="form-control" id="email" placeholder="{{ __('messages.Enter student email')}}" required=""  name="email" value="{{ old('email') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('email'))
                                              <p>{{ $errors->first('email') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">{{ __('messages.Mobile')}}</label>
                                        <input type="number" class="form-control" id="mobile" placeholder="{{ __('messages.Enter your mobile number')}}" required=""  name="mobile" value="{{ old('mobile') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('mobile'))
                                              <p>{{ $errors->first('mobile') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                            

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Password')}}</label>
                                        <input type="password" class="form-control" id="password" placeholder="{{ __('messages.Password')}}" name="password" required="" value="{{ old('password') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('password'))
                                              <p>{{ $errors->first('password') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label" style="float: left;width: 100%; margin-bottom: 15px;">{{ __('messages.Gender')}}</label>
                                        <input type="radio" class="" name="gender" value="Male" checked="">{{ __('messages.Male')}}
                                        <input type="radio" class="" name="gender" value="FeMale" style="margin-left: 10px">{{ __('messages.Female')}}
                                        <div class="help-block with-errors">
                                              @if($errors->has('gender'))
                                              <p>{{ $errors->first('gender') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Education')}}</label>
                                        <input type="text" class="form-control" id="education" placeholder="{{ __('messages.education')}}" name="education" required="" value="{{ old('education') }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('education'))
                                              <p>{{ $errors->first('education') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>

                                 

                               <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Address')}}</label>
                                        <textarea  class="form-control" id="address" placeholder="{{ __('messages.Enter student address')}}" required=""  name="address" value="">{{ old('address') }}</textarea>
                                        <div class="help-block with-errors">
                                              @if($errors->has('address'))
                                              <p>{{ $errors->first('address') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                             <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <input type="checkbox" style="float: left;
    margin-top: 5px;" required="" name="privacy_policy" value="1"> <p style="float:left;">By signing up you agree to our  <a href="{{url('privacy_policy')}}" >  Privacy Policy</a> and  <a href="{{url('terms')}}" >Terms & Conditions</a></p>
        <div class="help-block with-errors">
                                              @if($errors->has('privacy_policy'))
                                              <p>{{ $errors->first('privacy_policy') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <p>{{ __('messages.Already have an account ??')}} <a href="{{url('user_login')}}">{{ __('messages.Sign in')}}</a></p>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary disabled" style="pointer-events: all; cursor: pointer;">{{ __('messages.Register')}}</button>
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
.form-label {
    color: #000;
    font-weight: 600;
    display: none;
}
input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
    padding-right: 12px;
    margin-right: 5px;
    margin-top: 15px;
    padding-top: 9px;
}
</style>