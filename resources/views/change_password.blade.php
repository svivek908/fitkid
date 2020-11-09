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
      .form-label
      {
    color: #000;
    font-weight: 600;
      }
      .form-label {
    color: #000;
    font-weight: 600;
    display: none;
}
  </style>

 <div id="contact">
        <div class="content-wrap pb-0">
          <div class="section banner-page" data-background="{{asset('images/abouts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Change Password')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Change Password')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                       
                        @if(session()->has('message'))
                                       <div class="alert alert-success">
                                           {{ session()->get('message') }}
                                       </div>
                             @elseif(session()->has('emessage'))
                                       <div class="alert alert-danger">
                                           {{ session()->get('emessage') }}
                                       </div>
                             @endif
                        <form class="form-contact" action="{{route('update_password')}}" method="POST">
                           @csrf
                            <div class="row">
                             
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('messages.Current Password')}}</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="{{ __('messages.Enter your current password')}}" required=""  name="cpassword">
                                        
                                    
                                        <div class="help-block with-errors">
                                              @if($errors->has('cpassword'))
                                              <p>{{ $errors->first('cpassword') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.New Password')}}</label>
                                        <input type="password" class="form-control" id="password" placeholder="{{ __('messages.Enter password')}}" required=""  name="password">
                                        <div class="help-block with-errors">
                                              @if($errors->has('password'))
                                              <p>{{ $errors->first('password') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">{{ __('messages.Confirm Password')}}</label>
                                        <input type="password" class="form-control" id="npassword" placeholder="{{ __('messages.Confirm your password')}}" required=""  name="npassword">
                                        <div class="help-block with-errors">
                                              @if($errors->has('npassword'))
                                              <p>{{ $errors->first('npassword') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-6 col-md-6">
                                   <div class="form-group uu">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary disabled" style="pointer-events: all; cursor: pointer;">{{ __('messages.Update Password')}}</button>
                            </div>
                            </div>

                            </div>
                            
                           
                        </form>
                        <div class="spacer-content"></div>

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
.pb-5, .py-5 {
    padding-bottom: 3rem!important;
    margin-bottom: 0;
}
.spacer-content {
    display: none;
}

@media (max-width: 767px)
{
  
}
</style>