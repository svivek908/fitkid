  <?php 
   use App\Http\Controllers\HomeController;
        $user = HomeController::get_user();
        ?>
    <style type="text/css">
    .topbar .info .info-item .fa {
    margin-left: 7px;}
    
        a.active {
    color: #ffffff !important;
    background-color: #FD4D40 !important;
}
a.nav-link.dropdown-toggle {
    border: 1px solid #fd4d40;
}
div#google_translate_element {
    position: absolute;
    right: 320px;
    z-index:999;
}

select.goog-te-combo {
    padding: 9px;
    margin-top: 2px !important;
    background-color: transparent;
    color: #fff;
    border: 1px solid;
}
div#google_translate_element {
    position: static;
    /* right: 320px; */
    /* z-index: 999; */
    background-color: #000;
    padding: 10px;
}    
}
    </style>
    <!-- HEADER -->
    <div class="header header-1">

        <!-- TOPBAR -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-8 col-md-6">
                        <div class="info" style="text-align: -webkit-auto;">
                            <div class="info-item">
                                <i class="fa fa-phone"></i> 95580777
                            </div>
                            <div class="info-item">
                                <i class="fa fa-envelope-o"></i> <a href="mailto:info@fitkid.com" title="">coach.afra7@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-6">
                        @if(Config::get('app.locale') == 'ar')
                        <div class="sosmed-icon pull-left d-inline-flex">
                        @else
                        <div class="sosmed-icon pull-right d-inline-flex">
                        @endif
                       
                            @if(Config::get('app.locale') == 'ar')

                                  <a class='nav-link' href="{{ url('locale/en') }}" style="float: left;width: 35%;display: block;background-color:#000;"><i class="fa fa-globe" style="padding-top: 4px;padding-right: 20px;width: 7%; float:left;"></i><span style="float:left;"> EN</span></a>
                            @else
<a class='nav-link' href="{{ url('locale/ar') }}" style="float: left;width: 30%;display: block; background-color:#000;"><i class="fa fa-globe" style="    padding-top: 4px;
    padding-right: 20px;
    width: 7%; float:left;"></i> <span style="float:left;">AR</span></a>
@endif
                            <a href="https://www.facebook.com/" class="fb" target="_blank"><i class="fa fa-facebook" ></i></a> 
                            <a href="https://www.twitter.com/" class="tw" target="_blank"><i class="fa fa-twitter" target="_blank"></i></a> 
                            <a href="https://www.instagram.com/" class="ig"><i class="fa fa-instagram"></i></a> 
                            <a href="https://www.linkedin.com/" class="in" target="_blank"><i class="fa fa-linkedin"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NAVBAR SECTION -->
        <div class="navbar-main">
            <div class="container">
                <nav id="navbar-example" class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        @if(Config::get('app.locale') == 'ar') 
   
   
                        <ul class="navbar-nav" style="margin-right:auto;" >
                            <li class='nav-item {{ Request::segment(1) == "" ? "active" : "" }}'>
                                <a class="nav-link"  href="{{url('/')}}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "about" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/about')}}">{{ __('messages.ABOUT US') }}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "courses" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/courses')}}">{{ __('messages.COURSES')}}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "gallery" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/gallery')}}">{{ __('messages.GALLERY')}}</a>
                            </li>
                           <li class='nav-item {{ Request::segment(1) === "contact" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/contact')}}">{{ __('messages.CONTACT US')}}</a>
                            </li>
                            
                            @if($user)
                            @if($user['status']!='Disabled')
                            <li class='nav-item dropdown dmenu {{ Request::segment(1) === "profile_manage" ? "active" : "" }}'>
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="    text-transform: uppercase; border-radius: 20px!impotant;background-color: #F1C22E;width:auto; padding-left:25px; color: #fff;border: 1px saddlebrown;">
                                  {{$user->name}}
                                </a>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item" href="{{ url('customer/profile_manage')}}">{{ __('messages.My Profile')}}</a>
                                   <a class="dropdown-item" href="{{ url('customer/profile_course')}}">{{ __('messages.My Courses')}}</a>
                                   <a class="dropdown-item" href="{{ url('customer/change_password')}}">{{ __('messages.Change Password')}}</a>
                                   <a class="dropdown-item" href="{{ route('user-logout')}}">{{ __('messages.Logout')}}</a>
                                </div>
                            </li>
                            @else
                              @if($user['status']=='Disabled')
                            <li class='nav-item log'>

                                <a class='nav-link @if(Request::segment(1)=="user_register")  {{"active"}} @endif' style="padding: .5rem;margin: 0;" href="{{url('/user_register')}}">{{ __('messages.REGISTER')}}</a>

                                <a class='nav-link {{ Request::segment(1) === "user_login" ? "active" : "" }}' style="padding: .5rem;margin: 0;"  href="{{url('/user_login')}}">{{ __('messages.LOGIN')}}</a>
                            </li>
                            @endif
                            @endif
                            @else
                            <li class='nav-item log'>

                                <a class='nav-link @if(Request::segment(1)=="user_register")  {{"active"}} @endif' style="padding: .5rem;margin: 0;" href="{{url('/user_register')}}">{{ __('messages.REGISTER')}}</a>

                                <a class='nav-link {{ Request::segment(1) === "user_login" ? "active" : "" }}' style="padding: .5rem;margin: 0;"  href="{{url('/user_login')}}">{{ __('messages.LOGIN')}}</a>
                            </li>
                            @endif
                      
                        </ul>
                        @else  <ul class="navbar-nav" style="margin-left:auto;" >
                            <li class='nav-item {{ Request::segment(1) == "" ? "active" : "" }}'>
                                <a class="nav-link" style="text-transform: uppercase;"  href="{{url('/')}}">{{ __('messages.Home') }}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "about" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/about')}}">{{ __('messages.ABOUT US') }}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "courses" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/courses')}}">{{ __('messages.COURSES')}}</a>
                            </li>
                            <li class='nav-item {{ Request::segment(1) === "gallery" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/gallery')}}">{{ __('messages.GALLERY')}}</a>
                            </li>
                           <li class='nav-item {{ Request::segment(1) === "contact" ? "active" : "" }}'>
                                <a class="nav-link" href="{{url('/contact')}}">{{ __('messages.CONTACT US')}}</a>
                            </li>
                            
                            @if($user)
                            @if($user['status']!='Disabled')
                            <li class='nav-item dropdown dmenu {{ Request::segment(1) === "profile_manage" ? "active" : "" }}'>
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="    text-transform: uppercase; border-radius: 20px!impotant;background-color: #F1C22E;width:auto; padding-left:25px; color: #fff;border: 1px saddlebrown;">
                                  {{$user->name}}
                                </a>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item" href="{{ url('customer/profile_manage')}}">{{ __('messages.My Profile')}}</a>
                                   <a class="dropdown-item" href="{{ url('customer/profile_course')}}">{{ __('messages.My Courses')}}</a>
                                   <a class="dropdown-item" href="{{ url('customer/change_password')}}">{{ __('messages.Change Password')}}</a>
                                   <a class="dropdown-item" href="{{ route('user-logout')}}">{{ __('messages.Logout')}}</a>
                                </div>
                            </li>
                           
                             
                            @endif
                            @if($user['status']=='Disabled')
                            <li class='nav-item log'>

                                <a class='nav-link @if(Request::segment(1)=="user_register")  {{"active"}} @endif' style="padding: .5rem;margin: 0;" href="{{url('/user_register')}}">{{ __('messages.REGISTER')}}</a>

                                <a class='nav-link {{ Request::segment(1) === "user_login" ? "active" : "" }}' style="padding: .5rem;margin: 0;"  href="{{url('/user_login')}}">{{ __('messages.LOGIN')}}</a>
                            </li>
                            @endif
                            @else
                            <li class='nav-item log'>

                                <a class='nav-link @if(Request::segment(1)=="user_register")  {{"active"}} @endif' style="padding: .5rem;margin: 0;" href="{{url('/user_register')}}">{{ __('messages.REGISTER')}}</a>

                                <a class='nav-link {{ Request::segment(1) === "user_login" ? "active" : "" }}' style="padding: .5rem;margin: 0;"  href="{{url('/user_login')}}">{{ __('messages.LOGIN')}}</a>
                            </li>
                            @endif
                      
                        </ul> @endif
                    </div>
                </nav> <!-- -->

            </div>
        </div>

    </div>
<style>
    @media (max-width: 767px)
    {
      .sosmed-icon.pull-right.d-inline-flex {
    margin-top: 11px;
    float: right;
    margin-right: 17px;
}
    
    a.nav-link span {
    display: none;
}

}
.navbar-main .dropdown-toggle::after {
    margin-left: 0.6em;
    color: #fff;
}
.navbar-main .dropdown-menu {
    
    
    background-color: #f2f2f2;
    color: #000;
    
}
.navbar-main .dropdown-item {
    color: #000;
    padding: 0.5rem 1.5rem;
}
.navbar-main .dropdown-item:hover, .navbar-main .dropdown-item:focus {
    text-decoration: none;
    background-color: transparent;
    color: red;
}
.navbar-brand {
    padding-top: 0;
    padding-bottom: 0;
    
}
ul.navbar-nav.ml-auto li a {
    text-transform: uppercase;
}
.events-widget {
    background-color: #f8f8f8 !important;
   
}
</style>