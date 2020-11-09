@extends('layout.app')
@section('content')



    <!-- CONTENT -->   
@if(count($course_details))
    <div class="section ">
        <div class="content-wrap ii">

        <div class="content-wrap pb-0">
          <div class="section banner-page" data-background="{{asset('images/abouts.png')}}>
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <!--<div class="title-page">{{$course_details[0]->name}}</div>-->
               </div>
        </div>
    </div>
  </div>

            <div class="container">
                <div class="row">
                
                    @foreach($course_details as $k =>$v)
                    
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="events-widget">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="single-news">
                                    <img src="{{asset('admin-assets/course').'/'.$v->image}}" alt="" class="img-fluid rounded"> 
                                    <div class="spacer-30"></div>
        
                                    <h2 class="title">{{ __('messages.Course Description')}} </h2> 
                                  
                                    <div class="spacer-30"></div>
        
                                    <p>{{$v->description}}</p>
                                    <div class="spacer-50"></div>
                                </div>
                            </div>

                            <div class="widget-title" style="padding:20px;">{{ __('messages.Detail')}}</div>
                            <dl>
                                <dt>{{ __('messages.Course name:')}}</dt>
                                <dd>{{$v->name}}</dd>
                                <dt>{{ __('messages.Fees:')}}</dt>
                                <dd>{{$v->fees}}&nbsp;KD</dd>
                                <dt>{{ __('messages.Age:')}}</dt>
                                <dd>{{$v->age_from}} - {{$v->age_to}} years</dd>
                                <dt>{{ __('messages.Class Strength:')}}</dt>
                                <dd>{{$v->class_size}}</dd>
                                <dt>Class Time:</dt>
                                <dd>{{$v->open_time}} To {{$v->close_time}}</dd>
                                <dt>{{ __('messages.Started From:')}}</dt>
                                <dd>{{$v->start_date}}</dd>
                                <dt>{{ __('messages.End date:')}}</dt>
                                <dd>{{$v->end_date}}</dd>
                                <dt>{{ __('messages.Remaining days:')}}</dt>
                                @php $get_day=strtotime($v->end_date)-strtotime(date("Y-m-d")); @endphp
                                <dd>{{round($get_day / (60 * 60 * 24)) }} </dd>
                            </dl>
                             <a class="btn btn-primary btn-block block-btn bb" href="{{asset('admin-assets/course/document').'/'.$v->document}}" download="" style="width: auto;margin: auto;">&nbsp;{{ __('messages.Download Document')}}</a>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
        @else
     <div class="section ">
        <div class="content-wrap ii" style="padding: 0 !important;margin: 0 !important;">
         <div class="content-wrap pb-0" style="padding: 0 !important;margin: 0 !important;">
             <div class="section banner-page" data-background="{{asset('images/abouts.png')}}">
            <div class="content-wrap pos-relative">
                <div class="d-flex justify-content-center bd-highlight mb-3">
                    <div class="title-page">{{ __('messages.My Courses')}}</div>
                   </div>
               </div>
            </div>
         </div>

         <div class="container">
           
            <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="title-page"><h2>{{ __("messages.OOPS! Currently you don't have any course available")}}</h2></div>
            </div>
              <a class="btn btn-primary btn-block block-btn bb" href="{{url('/courses')}}" style="width: 25%;margin: auto;">&nbsp;{{ __('messages.Buy a course')}}</a>
        </div>
             

        
         </div>

        </div>
    </div>
       @endif     
 @endsection    

<style>
    dt {
    font-weight: 700;
    float: left;
    margin-right: 10px;
}
dd
{
    text-align: right;
}
.img-fluid
{
    width: 100%;
}
  .content-wrap {
    padding-bottom: 80px!important; 
    margin-bottom: 0px;
   
}
.pb-0, .py-0
{
  padding: unset!important;
}
.banner-page .content-wrap {
    padding: 70px 0;
    padding-top: 60px!important;
}
.pb-5, .py-5 {
    padding-bottom: 3rem!important;
    margin-bottom: 0;
}
.ii
{
    margin-bottom: 0
}
.content-wrap {
    padding: 0px 0 !important;
}
.title-page {
    margin-bottom: 6% !important;
}
.bg-tertiary {
    background-color: #16C3B0 !important;
    margin-top: 30px;
}
</style>