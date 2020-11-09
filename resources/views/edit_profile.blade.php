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
  </style>

 <div id="contact">
        <div class="content-wrap pb-0">
           <div class="section banner-page" data-background="{{asset('images/courcess.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Update Profile')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Update Profile')}}</li>
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
                        <form class="form-contact" action="{{route('update_user')}}" method="POST">
                           @csrf
                            <div class="row">
                             
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('messages.Name')}}</label>
                                        <input type="text" class="form-control" id="name" placeholder="{{ __('messages.Enter student name')}}" required=""  name="name" value="{{ $users->name }}">
                                        <input type="hidden" class="form-control" name="id" value="{{ $users->id }}">
                                    
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
                                        <input type="email" class="form-control" id="email" placeholder="{{ __('messages.Enter student email')}}" required=""  name="email" value="{{ $users->email }}" disabled="">
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
                                        <input type="number" class="form-control" id="mobile" placeholder="{{ __('messages.Enter your mobile number')}}`" required=""  name="mobile" value="{{ $users->mobile }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('mobile'))
                                              <p>{{ $errors->first('mobile') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            

                                 <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Education')}}</label>
                                        <input type="text" class="form-control" id="education" placeholder="{{ __('messages.education')}}" name="education" required="" value="{{ $users->education }}">
                                        <div class="help-block with-errors">
                                              @if($errors->has('education'))
                                              <p>{{ $errors->first('education') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group" >
                                      <label class="form-label" style="float: left;width: 100%;padding-bottom: 10px;">{{ __('messages.Gender')}}</label>
                                        <input type="radio" class="" name="gender" value="Male" @if($users->gender == 'Male'){{'checked'}}@endif>{{ __('messages.Male')}}
                                        <input type="radio" class="" name="gender" value="FeMale" @if($users->gender == 'FeMale'){{'checked'}}@endif>{{ __('messages.Female')}}
                                        <div class="help-block with-errors">
                                              @if($errors->has('gender'))
                                              <p>{{ $errors->first('gender') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>


                                 

                               <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                      <label class="form-label">{{ __('messages.Address')}}</label>
                                        <textarea  class="form-control" id="address" placeholder="{{ __('messages.Enter student address')}}" required=""  name="address" value="">{{ $users->address }}</textarea>
                                        <div class="help-block with-errors">
                                              @if($errors->has('address'))
                                              <p>{{ $errors->first('address') }}</p>
                                              @endif
                                        </div>
                                    </div>
                                </div>
                            

                            </div>
                            
                            <div class="form-group">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary disabled" style="pointer-events: all; cursor: pointer;">{{ __('messages.Update')}}</button>
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
</style>