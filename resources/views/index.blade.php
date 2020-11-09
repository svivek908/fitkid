@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  <style type="text/css">
      a.btn.btn-secondary {
    font-size: 14px;
    color: #ffffff;
    padding: 14px 37px;
    border: 0;
    margin-right: 8px;
    min-width: 130px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    border-radius: 30px;
}
.rs-box-testimony .quote-box .quote-name {
    margin-top: 30px;
    font-size: 18px;
    line-height: 34px;
    color: #FD4D40;
    text-align: center;
}
.supheading:before, .supheading:after {
    content: " - "; 
    display: none;
}
.owl-carousel, .bx-wrapper { direction: ltr; } 
  </style>
    <!-- BANNER -->
    <div id="oc-fullslider" class="banner">
        <div class="owl-carousel owl-theme full-screen">
            @if($banners)
            @foreach($banners as $banner)
            <div class="item">
                <img src="{{asset('admin-assets/Banner').'/'.$banner->image}}" alt="Slider">
                <div class="overlay-bg"></div>
                <div class="container d-flex align-items-center">
                    <div class="wrap-caption">
                        <h5 class="caption-supheading">{{ __('messages.Welcome to FitKid')}}</h5>
                        <?php if($banner->title=='We transfer weakness to strength'){?>
                        <h1 class="caption-heading">{{__('messages.stength')}}</h1>
                        <?php } ?>
                        <?php if($banner->title=='We increase self-confidence and self-esteem.'){?>
                        <h1 class="caption-heading">{{__('messages.esteem')}}</h1>
                        <?php } ?>
                        <?php if($banner->title=='We create social environment'){?>
                        <h1 class="caption-heading">{{__('messages.enviroment')}}</h1>
                        <?php } ?>
                      <!--   <a href="#" class="btn btn-secondary">LEARN MORE</a> -->
                    </div>  
                </div>
            </div>
              @endforeach
            @endif
        </div>
        <div class="custom-nav owl-nav"></div>
    </div>  

    <!-- SHORTCUT -->
    <div class="section services">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="row col-0 overlap no-gutters">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <!-- BOX 1 -->
                                <div class="rs-feature-box-1 bg-primary">
                                    <i class="fa fa-clock-o"></i>
                                    <div class="body">
                                        <h4>{{ __('messages.Full Day Programs')}}</h4>
                                        <p>{{ __('messages.Sedut perspiciatis unde omnis iste natus error sit voluptatem accusantium.')}}</p>
                                        <a href="{{url('/courses')}}" class="btn btn-secondary" style="margin-top: 17px">{{ __('messages.LEARN MORE')}}</a>
                                        <div class="spacer-10"></div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <!-- BOX 2 -->
                                <div class="rs-feature-box-1 bg-secondary">
                                    <i class="fa fa-home"></i>
                                    <div class="body">
                                        <h4>{{ __('messages.Full Day Programs')}}</h4>
                                        <p>{{ __('messages.Sedut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium')}}</p>
                                         <a href="{{url('/courses')}}" class="btn btn-secondary">{{ __('messages.LEARN MORE')}}</a>
                                        <div class="spacer-10"></div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <!-- BOX 3 -->
                                <div class="rs-feature-box-1 bg-tertiary">
                                    <i class="fa fa-trophy"></i>
                                    <div class="body">
                                        <h4>{{ __('messages.Full Day Programs')}}</h4>
                                        <p>{{ __('messages.Sedut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium')}}</p>
                                         <a href="{{url('/courses')}}" class="btn btn-secondary">{{ __('messages.LEARN MORE')}}</a>
                                        <div class="spacer-10"></div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <!-- WELCOME TO KIDS -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <img src="{{ asset('images/imgpsh_fullsize_anim.png') }}" alt="" class="img-fluid img-border">
                    </div>
                    @if(Config::get('app.locale') == 'ar')
                     <div class="col-sm-12 col-md-12 col-lg-6 text-right">
                    @else
                         <div class="col-sm-12 col-md-12 col-lg-6">
                        @endif
                    <!--<div class="col-sm-12 col-md-12 col-lg-6">-->
                        <h2 class="section-heading">
                            {{ __('messages.Welcome to FitKid')}}
                        </h2>
                        <p>
                            {{ __('messages.choose')}}: <br>
                            <span>{{ __('messages.choose1')}}</span><br></p>
                            <span>{{ __('messages.choose2')}}</span><br>
                            <span>{{ __('messages.choose3')}}</span><br>
                            <span>{{ __('messages.choose4')}}</span><br>
                            <span>{{ __('messages.choose5')}}</span><br>
                            <span>{{ __('messages.choose6')}}</span><br>
                        <p></p>
        <!--                <p>Our institution focuses on developing and improving:<br>-->
        <!--  <span>Selfconfidence and selfesteem</span></p>-->
        <!--  <span> Self defense</span><br>-->
        <!--<span> Physical fitness</span><br>-->
        <!--<span> Concentration</span><br>-->
        <!--<span> Discipline</span><br>-->
        <!--<span> Social skills</span><br><p></p>-->
                        <!--<p>@php print( __('messages.Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent. Sed ut perspiciatis unde omnis iste natus error sitdolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.  Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent. Magna est consectetur interdum modest dictum.')); @endphp</p>-->
                        <!--<p>{{ __('messages.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent.')}} </p>-->
                        
                        <a href="{{url('/about')}}" class="btn btn-secondary">{{ __('messages.DISCOVER MORE')}}</a>
                        <div class="spacer-30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FUNFACT -->
    <div class="section bgi-overlay bgi-cover-center" style="height: 50%;" data-background="{{ asset('images/imgpsh_fullsize_animsss.png') }}">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <!-- Item 1 -->
                    <!--<div class="col-sm-6 col-md-4">-->
                    <!--    <div class="rs-funfact bg-primary">-->
                    <!--        <div class="box-fun"><h2>{{$student}}</h2></div>-->
                    <!--        <div class="title">{{ __('messages.Students')}}</div>   -->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- Item 2 -->
                    <!--<div class="col-sm-6 col-md-4">-->
                    <!--    <div class="rs-funfact bg-secondary">-->
                    <!--        <div class="box-fun"><h2>{{$batches}}</h2></div>-->
                    <!--        <div class="title">{{ __('messages.Batches')}}</div>   -->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- Item 3 -->
                    <!--<div class="col-sm-6 col-md-4">-->
                    <!--    <div class="rs-funfact bg-tertiary">-->
                    <!--        <div class="box-fun"><h2>{{$courses}}</h2></div>-->
                    <!--        <div class="title">{{ __('messages.Courses')}}</div>    -->
                    <!--    </div>-->
                    <!--</div>-->
                  
                </div>
            </div>
        </div>
    </div>

    <!-- OUR ARTICLES -->
    <div class="">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <p class="supheading text-center">{{ __('messages.Our Programs')}}</p>
                        <h2 class="section-heading text-center mb-5">
                            {{ __('messages.Popular Courses')}}
                        </h2>
                    </div>
                </div>

                <div class="row mt-4">
                    @if($course)
                    @foreach($course as $key=>$courses)
                    <!-- Item {{$key}} -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="rs-class-box mb-5">
                            <div class="media-box">
                                <img src="{{asset('admin-assets/course').'/'.$courses->image}}" alt="" class="img-fluid"></div>
                            <div class="body-box">
                                <div class="class-name">
                                   <div class="title">{{$courses->name}}</div>
                                    <div class="price">{{$courses->fees}}&nbsp;SAR</div>
                                </div>
                                  <div class="open-class">{{ __('messages.Open Class')}}: <span>{{$courses->open_time_from}} - {{$courses->open_time_to}}</span></div>
                                <div class="open-class">
                               <!--   <a href="#" class="btn btn-secondary">Buy now</a> -->
                                 <a href="{{url('course_details').'/'.$courses->id}}" class="btn btn-secondary" style="margin-left: 25%;">{{ __('messages.More details')}}</a>
                                </div>
                               <div class="detail">
                                    <div class="age col">{{ __('messages.Age')}} {{$courses->age_from}}-{{$courses->age_to}} {{ __('messages.years')}}</div>
                                    <div class="size col">{{ __('messages.Class Size')}} {{$courses->class_size}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                 @endforeach
                  @endif
                 
                  

                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="text-center">
                            <a href="{{url('/courses')}}" class="btn btn-primary">{{ __('messages.SEE MORE COURSES')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- WHY CHOOSE US -->
    <div class="section bgi-repeat" style="background: #f1c22e;">
        <div class="content-wrap pb-0" style="padding: 0px 0; margin-top: 50px;">
            <div class="container">
                <div class="row align-items-end" style="align-items: center!important;">
                    <div class="col-sm-12 col-md-12 col-lg-7" style="margin-bottom: 321px;">
                        <p class="supheading">{{ __('messages.Why Choose Us')}}</p>
                        <h2 class="section-heading">
                            {{ __('messages.We transfer weakness to strength by boosting self-confidence and self esteem')}}
                        </h2>
                        <!--<h2 class="section-heading">-->
                        <!--    {{ __('messages.Best Karate Training Courses')}}-->
                        <!--</h2>-->
                        <!--<p class="text-white">{{ __('messages.Dolor sit amet, dolor gravida placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod. Dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod. Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent. Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent.')}}</p>-->
                        <!--<p class="p-check text-white">{{ __('messages.100% education, for your kids, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Dolor sit amet, dolor gravida placerat liberolorem ipsum dolor consectetur adipiscing elit, sed do eiusmod.')}}</p>-->
                        <!--<p class="p-check text-white">{{__('More programs activities, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet.')}}</p>-->
                        <!--<p class="p-check text-white">{{ __('messages.More benefit nonummy nibh euismod. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.')}}</p>-->
                        <div class="spacer-90"></div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <img src="{{ asset('images/newteacherss.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- OUR GALLERY -->
    <div class="">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <p class="supheading text-center">{{ __('messages.Our Gallery')}}</p>
                        <h2 class="section-heading text-center mb-5">
                            {{ __('messages.Moment from Fitkid')}}
                        </h2>
                    </div>
                </div>
                
                <div class="row popup-gallery gutter-5">
                    @if($gallery)
                    @foreach($gallery as $key=>$values)
                    <!-- Item {{$key}} -->
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="box-gallery">
                            <a href="{{asset('admin-assets/gallery').'/'.$values->image}}" title="Gallery #{{$key}}">
                                <img src="{{asset('admin-assets/gallery').'/'.$values->image}}" alt="" class="img-fluid">
                                <div class="project-info">
                                    <div class="project-icon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                  @endforeach
                  @endif
                  
                  
                    
                </div>
                  <div class="spacer-30"></div>
                  <a href="{{url('/gallery')}}" class="btn btn-secondary" style="margin:0 auto; display: table; ">{{ __('messages.VIEW MORE')}}</a>
            </div>
        </div>
    </div>

    <!-- OUR VIDEO -->
    <div class="">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <p class="supheading text-center">{{ __('messages.Videos')}}</p>
                        <h2 class="section-heading text-center mb-5">
                            {{ __('messages.Moment from Fitkid')}}
                        </h2>
                    </div>
                </div>
                
                <div class="row popup-gallery gutter-5">
                    @if($video)
                    @foreach($video as $key=>$valuess)
                    <!-- Item {{$key}} -->
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="box-gallery">
                           <iframe width="560" height="315" src="{{$valuess->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

                        </div>
                    </div>
                  @endforeach
                  @endif
                  
                  
                    
                </div>
                  <div class="spacer-30"></div>
                  <a href="{{url('/gallery')}}" class="btn btn-secondary" style="margin:0 auto; display: table; ">{{ __('messages.VIEW MORE')}}</a>
            </div>
        </div>
    </div>

    <!-- OUR TESTIMONIALS -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <p class="supheading text-center">{{ __('messages.Our Testimonials')}}</p>
                        <h2 class="section-heading text-center mb-5">
                            {{ __('messages.What Parents say')}}
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-10 offset-md-1">
                        <div class="text-center text-secondary mb-3"><i class="fa fa-quote-right fa-3x"></i></div>
                        <div id="testimonial" class="owl-carousel owl-theme">
                            @if($testi)
                            @foreach($testi as $testimonial)
                            <div class="item">
                                <div class="rs-box-testimony">
                                    <div class="quote-box">
                                        <blockquote>
                                        {{$testimonial->description}}
                                        </blockquote>
                                      <!--   <div class="media">
                                            <img src="{{ asset('images/team-img1.jpg') }}" alt="" class="rounded-circle">
                                        </div> -->
                                        <p class="quote-name">
                                             {{$testimonial->name}} <span> {{$testimonial->designation}}</span>
                                        </p>                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
 
 var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
        }
 };
 
 var Status = getUrlParameter("Status");
 var PaymentToken = getUrlParameter("PaymentToken");
 var PaymentId = getUrlParameter("PaymentId");
 var PaidOn = getUrlParameter("PaidOn");
 
 var orderReferenceNumber = getUrlParameter("orderReferenceNumber");
 
 if(typeof Status !== 'undefined'  && typeof PaymentToken !== 'undefined' &&
    typeof PaymentId !== 'undefined' && typeof PaidOn !== 'undefined' && typeof orderReferenceNumber !== 'undefined'){
     var _token = "{{csrf_token()}}";
      var data ={_token:_token, Status : Status,PaymentToken : PaymentToken, PaymentId : PaymentId, PaidOn : PaidOn, orderReferenceNumber : orderReferenceNumber};  
      data = new FormData();
      data.append("_token",_token);
      data.append("Status",Status);
      data.append("PaymentToken",PaymentToken);
      data.append("PaymentId",PaymentId);
      data.append("PaidOn",PaidOn);
      data.append("orderReferenceNumber",orderReferenceNumber);
       $.ajax({
              url :"https://www.fitkids-kw.com/payment_status",
              type : "POST",
              data : data,           
              cache: false,             
              processData: false,
              contentType: false, 
              dataType: "json",
              success: function(response) 
              {
                if(response.result == true)
                {
                    toastr.success(response.message);
                }else{
                    toastr.info(response.message);
                }
                window.location.href="https://www.fitkids-kw.com/";
              },
              error: function(response)
              {
                    toastr.error(JSON.stringify(response));
              }       
            });
      
       

    }
  
 

</script>
@endsection