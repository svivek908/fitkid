@extends('layout.app')
@section('content')
<style>
    
        .supheading:before, .supheading:after {
    content: " - "; 
    display: none;

    }
</style>
    <!-- LOAD PAGE -->
  
    <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/abouts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.About Us')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.About Us')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- WHY CHOOSE US -->
    <div class="section">
        <div class="content-wrap pb-0">
            <div class="container">
                <div class="row align-items-end" style="align-items: center!important;">@if(Config::get('app.locale') == 'ar')
                     <div class="col-sm-12 col-md-12 col-lg-7 text-right">
                    @else
                         <div class="col-sm-12 col-md-12 col-lg-7">
                        @endif
                    <!--<div class="col-sm-12 col-md-12 col-lg-7"  >-->
                        <p class="supheading">{{ __('messages.About Us')}}</p>
                        <p>Our institution focuses on developing and improving:<br>
          <span>Selfconfidence and selfesteem</span></p>
          <span> Self defense</span><br>
        <span> Physical fitness</span><br>
        <span> Concentration</span><br>
        <span> Discipline</span><br>
        <span> Social skills</span><br><p></p>
                        <!--<p>@php print( __('messages.Teritatis et quasi architecto. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent. Sed ut perspiciatis unde omnis iste natus error sitdolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.  Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent. Magna est consectetur interdum modest dictum.')); @endphp</p>-->
                    </div>    
                    <div class="col-sm-12 col-md-12 col-lg-7"style="margin-bottom: 321px !important;">
                        <p class="supheading">{{ __('messages.Why Choose Us')}}</p>
                        <h2 class="section-heading mb-5">
                            {{ __('messages.We transfer weakness to strength by boosting self-confidence and self esteem')}}
                        </h2>
                        <!--<p class="">-->
                        <!--    {{ __('messages.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.  Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent.  Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis luctus novum est praesent.')}}-->
                        <!--</p>-->
                        <!--<p class="p-check ">{{ __('messages.100% education, for your kids, consectetuer adipiscing elit, sed diam nonummy nibh euismod.')}}</p>-->
                        <!--<p class="p-check ">{{ __('messages.More programs activities, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet.')}}</p>-->
                        <!--<p class="p-check ">{{ __('messages.More benefit nonummy nibh euismod. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.')}}</p>-->
                        <div class="spacer-90"></div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <img src="{{asset('images/newteacherss.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

  


   


@endsection