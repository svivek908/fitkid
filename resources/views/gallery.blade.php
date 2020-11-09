@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
  
   <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/gallerys.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Gallery')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Gallery')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- OUR GALLERY -->
    <div class="">
        <div class="content-wrap">
            <div class="container">
                <h1>{{ __('messages.Photos')}}</h1>
                <div class="row popup-gallery gutter-5">
                    @if($gallery)
                    @foreach($gallery as $key=>$gallery_imgs)
                    <!-- Item {{$key}} -->
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="box-gallery">
                            <a href="{{asset('admin-assets/gallery').'/'.$gallery_imgs->image}}" title="Gallery #{{$key}}">
                                <img src="{{asset('admin-assets/gallery').'/'.$gallery_imgs->image}}" alt="" class="img-fluid">
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
                
            </div>
            <div class="container">
                <h1>{{ __('messages.Videos')}}</h1>
                <div class="row popup-gallery gutter-5">
                    @if($video)
                    @foreach($video as $key=>$videos)
                    <!-- Item {{$key}} -->
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="box-gallery">
                               
                           <iframe width="560" height="315" src="{{$videos->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endforeach
                    @endif
                
                
                
             
                </div>
                
            </div>
        </div>
    </div>


@endsection