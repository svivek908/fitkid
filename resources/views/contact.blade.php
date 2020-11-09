@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  
<!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/contacts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Contact Us')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Contact Us')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <div id="contact">
        <div class="content-wrap pb-0">
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
                        <form action="{{url('add_contact')}}" class="form-contact" id="" data-toggle="validator" novalidate="true" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="p_name" placeholder="{{ __('messages.Enter Name')}}" required="" name="name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="p_email" placeholder="{{ __('messages.Enter Email')}}" required="" name="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="p_subject" placeholder="{{ __('messages.Subject')}}" name="subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="p_phone" placeholder="{{ __('messages.Enter Phone Number')}}" name="mobile">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                 <textarea id="p_message" class="form-control" rows="6" placeholder="{{ __('messages.Enter Your Message')}}" name="message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary">{{ __('messages.Send Message')}}</button>
                            </div>
                        </form>
                        <div class="spacer-content"></div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1781287.9077480363!2d46.414478775959395!3d29.30938918651801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2sKuwait!5e0!3m2!1sen!2sin!4v1602136663832!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462565.1975944678!2d54.94755315007106!3d25.075085307174227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1584450927717!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
    <!-- MAPS -->
<!--     <div class="maps-wraper">
        <div id="cd-zoom-in"></div>
        <div id="cd-zoom-out"></div>
        <div id="maps" class="maps" data-lat="-7.452278" data-lng="112.708992" data-marker="{{ asset('images/cd-icon-location.png')}}">
        </div>
    </div> -->
<style type="text/css">
    .help-block.with-errors {
    color: red;
}
</style>
   



@endsection