
    <!-- CTA -->
    <div class="section bg-tertiary">
        <div class="content-wrap py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12">
                        <div class="cta-1">
                            <div class="body-text mb-3">
                                <h3 class="my-1 text-secondary">{{ __("messages.Let's join the best Karate now!")}}</h3>
                                <p class="uk18 mb-0 text-white">{{ __('messages.We provide high standard Karate Training for your kids')}}</p>
                            </div>
                            <div class="body-action">
                                <a href="{{url('/contact')}}" class="btn btn-primary mt-3">{{ __('messages.CONTACT US')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER SECTION -->
    <div class="footer" data-background="{{asset('images/imgpsh_fullsize_animssss.png')}}">
        <div class="content-wrap">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                             <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('images/logo.png')}}" alt="logo bottom" class="logo-bottom">
                        </a>
                            <div class="spacer-30"></div>
                             <div class="sosmed-icon d-inline-flex">
                               <a href="https://www.facebook.com/" class="fb" target="_blank"><i class="fa fa-facebook" ></i></a> 
                            <a href="https://www.twitter.com/" class="tw" target="_blank"><i class="fa fa-twitter" target="_blank"></i></a> 
                            <a href="https://www.instagram.com/" class="ig"><i class="fa fa-instagram"></i></a> 
                            <a href="https://www.linkedin.com/" class="in" target="_blank"><i class="fa fa-linkedin"></i></a> 
                            </div>
                           <!--  <a href="{{url('/about')}}"><i class="fa fa-angle-right"></i> Read More</a> -->
                        </div>
                    </div>                  

                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                               {{ __('messages.Contact Info')}}
                            </div>
                            <ul class="list-info">
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="info-text">{{ __(' Salmiya , Gulf Road , Burj Al Tayeb , Floor 2 , beside Dar Hamad Restaurant')}}</div> </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="info-text">{{ __('95580777')}}</div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="info-text">{{ __(' coach.afra7@gmail.com')}}</div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-clock-o"></span>
                                    </div>
                                    <div class="info-text">{{ __('Sun - Sat 3:00 pm - 10 pm')}}</div>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                                {{ __('messages.Useful Links')}}
                            </div>
                            
                            <ul class="list">
                                <li><a href="{{url('/')}}" title="Home">{{ __('messages.Home')}}</a></li>
                                <li><a href="{{url('/about')}}" title="About us">{{ __('messages.About us')}}</a></li>
                                <li><a href="{{url('/courses')}}" title="Courses">{{ __('messages.Courses')}}</a></li>
                                <li><a href="{{url('/gallery')}}" title="Gallery">{{ __('messages.Gallery')}}</a></li>
                              
                            </ul>
                                
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="footer-item">
                            <div class="footer-title">
                              {{ __('messages.More Information')}}
                            </div>
                          
                             <ul class="list">
                              <li><a href="{{url('/contact')}}" title="Contact Us">{{ __('messages.Contact Us')}}</a></li>
                                <li><a href="{{url('/user_register')}}" title="Register">{{ __('messages.Register')}}</a></li>
                                <li><a href="{{url('/user_login')}}" title="Login">{{ __('messages.Login')}}</a></li>
                                <li><a href="{{url('/faq')}}" title="Faq">{{ __('messages.Faq')}}</a></li>
                            </ul>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="fcopy">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <p class="ftex">{{ __('messages.Copyright')}} &copy; 2020, {{ __('messages.Fitkid All Rights Reserved.')}}<span class="color-primary"></span>.  <span class="color-primary"></span></p> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <style>
        
    </style>