@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->
<style type="text/css">
    .single-news .title
    {
        font-size: 19px;
    }
    .title span {
    font-size: 14px;
}
dt {
    font-weight: 700;
    float: left;
    margin-right: 10px;
}
dd
{
    text-align: right;
}
.kk
{
    margin-top: 58px;
}
.single-news .title {
    font-size: 24px;
    font-weight: 700;
    color: #979ca2;
}

</style>
<div class="section banner-page" data-background="{{asset('images/abouts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.My Profile')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.My Profile')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>  


    <!-- CONTENT -->
    <div class="section ">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="single-news">
                        <div class="row" style="float: left;width: 100%; margin-bottom: 25px">
    <!-- <div class="col-md-3">
    </div> -->
    <div class="col-12 col-md-4">
                            <img src="{{asset('images/kid.png')}}" style="width: 100%;margin-top: -20px">
                        </div>
    <div class="col-md-8">
<div class="">

            <div class="events-widget" style="line-height: 30px;">
                    <div class="widget-title " style="padding:23px;">{{ __('messages.Profile Details')}}</div>
             <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><span>{{ __('messages.Full Name')}}</span></div>
                <div class="data-content">{{$users[0]->sname}}</div>
              </div>

               <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-envelope"></i><span>{{ __('messages.Email Address')}}</span></div>
                <div class="data-content">{{$users[0]->email}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-phone-handset"></i><span>{{ __('messages.Mobile')}}</span></div>
                <div class="data-content">{{$users[0]->mobile}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-phone-handset"></i><span>{{ __('messages.Gender')}}</span></div>
                <div class="data-content">{{$users[0]->gender}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-phone-handset"></i><span>{{ __('messages.Education')}}</span></div>
                <div class="data-content">{{$users[0]->education}}</div>
              </div>
             <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-map-marker"></i><span>{{ __('messages.Address')}}</span></div>
                <div class="data-content">{{$users[0]->address}}</div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni-envelope"></i><span>{{ __('messages.Status')}}</span></div>
                <div class="data-content"><span class="db-done">{{$users[0]->sstatus}}</span>                                </div>
              </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
             <a class="btn btn-primary btn-block block-btn bb" href="{{url('customer/edit_profile')}}" >&nbsp;{{ __('messages.Edit Profile')}}</a>
         </div>
            </div>
          </div>

    </div>
    <!-- <div class="col-md-3">
    </div> -->
</div>
                            <div class="spacer-30"></div>

                        
                          
                            
                        
                            
                        
                            

                        </div>
                    </div>
             

                </div>
            </div>
        </div>
    </div>


@endsection
<style >
    .bb
    {
        width: 25%!important; margin: auto;
    }
    .col-sm-12.col-md-12.col-lg-9
    {
        padding-right: 15px;
    }
    @media (max-width: 767px)
    {
        .bb
        {
            width: 100%!important;
        }
        .col-sm-12.col-md-12.col-lg-9
    {
        padding-right: 0px;
    }
    .data-content {
   
   
    font-size: 12px;

    }
    .title span {
    font-size: 10px !important;
}
    }
    .events-widget {
    border-radius: inherit;
}
.data-content {
    float: left;
    width: 60%;
    text-transform: capitalize;
}
.single-news .title {
    font-size: 24px;
    font-weight: 700;
    color: #979ca2;
    float: left;
    width: 40%;
}
.events-widget {
    border-radius: inherit;
}
.btn-primary {
   
   
    margin-top: 6%;
}
</style>