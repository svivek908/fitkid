@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->


    <!-- CONTENT -->
    <div class="section ">
        <div class="content-wrap ii">
               <div class="content-wrap pb-0">
          <div class="section banner-page" data-background="{{asset('images/contacts.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{$course_details->name}}</div>
            </div>
     <!--        <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                  </ol>
                </nav>
            </div> -->
        </div>
    </div>
  </div>
</div>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="single-news">
                            <img src="{{asset('admin-assets/course').'/'.$course_details->image}}" alt="" class="img-fluid rounded"> 
                            <div class="spacer-30"></div>

                           
                          
                          
                      

                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="events-widget">
                           <style>
                           .float-r{
                               float: right;
                               margin-left: 5px;
                               
                           }
                           </style>

                            <div class="widget-title">{{ __('messages.Detail')}}</div>
                            <dl>
                                <dt>{{ __('messages.Course name')}}<span class="float-r">:</span></dt>
                                <dd>{{$course_details->name}}</dd>
                                <dt>{{ __('messages.Fees')}}<span class="float-r">:</span></dt>
                                <dd>{{$course_details->fees}}&nbsp;KED</dd>
                                <dt>{{ __('messages.Age')}}<span class="float-r">:</span></dt>
                                <dd>{{$course_details->age_from}} - {{$course_details->age_to}} {{ __('messages.years')}}</dd>
                                <dt>{{ __('messages.Class Strength')}}<span class="float-r">:</span></dt>
                                <dd>{{$course_details->class_size}}</dd>
                                <dt>{{ __('messages.Time')}}<span class="float-r">:</span></dt>
                                @if(count($batch_details))
                              
                              
                                @foreach($batch_details as $index=> $b_det)
                                <?php $now = new DateTime();?>
                                
                                <br/>
                                <div>
                                    @if($now->format('Y-m-d')<=$b_det->start_date)
                                   @if($class_details_data[$index] < $course_details->class_size)
                                <input type="radio" name="batch_id" value="{{$b_det->id}}">
                                <span style="color: #000;margin-left:5px;">{{$b_det->open_time}} - {{$b_det->close_time}}
                                </span><br>
                                <span style="color: #000;margin-left:5px;">{{$b_det->start_date}} - {{$b_det->end_date}}
                                </span><br>
                                <span style="color: #000;margin-left:5px;">{{$b_det->days}}</span>
                                </div>
                                @endif
                                @endif
                                @endforeach
                                @else
                                <dd>{{ __('messages.No batch available')}}</dd>

                                @endif
                                
                            </dl>
    
                            <div class="spacer-30"></div>
                            @if(count($batch_details))
                            <a  class="btn btn-primary btn-block buy-button" data-toggle="modal" data-target="#myModal" style="width: 40%;float: left; background-color:blue; color:#fff; margin-right:20px;">{{ __('messages.Print')}}</a>
                          
                          
                                @if(auth()->guard('customer')->check())
                                  <a class="btn btn-primary btn-block buy-button" id="buy-course-btn" data-course_id='{{$course_details->id}}' data-price='{{$course_details->fees}}' style="width: 40%;float: left; margin-top:0px; color:#fff;">{{ __('messages.Buy now')}}</a>
                                @else
                                  <a class="btn btn-primary btn-block buy-button" href="{{route('user_login')}}"  style="width: 40%;float: left; margin-top:0px; color:#fff;">{{ __('messages.Buy now')}}</a>
                                @endif
                              
                            @endif
                            <div class="spacer-30"></div>
                        </div>
                    </div>
                    <div class="col-md-10" style="margin-bottom: 30px;
    border: 1px solid #ede9e9;
    background-color: #f8f9fa;
    padding: 10px 30px 30px 30px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    -ms-border-radius: 20px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 0 12px 0px #cecbcb; margin-top:30px;">
                         <h2 class="title"> {{ __('messages.Course Description')}} </h2> 
                                                    <p>{{$course_details->description}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body" id="DivIdToPrint">
        <h2 style="text-align: center;" class="modal-title">{{ __('messages.Course Details')}} </h2>
           
<table style="width:100%">
  <tr>
    <th style="text-align: left;">{{ __('messages.Course name')}}</th>
    <th colspan="2" style="text-align: right;">{{$course_details->name}}</th>
  </tr>
  <tr>
    <th style="text-align: left;">{{ __('messages.Fees')}}</th>
    <th colspan="2" style="text-align: right;">{{$course_details->fees}}&nbsp;SAR</th>
  </tr>
  <tr>
    <th style="text-align: left;">{{ __('messages.Age')}}</th>
    <th colspan="2" style="text-align: right;">{{$course_details->age_from}} - {{$course_details->age_to}} {{ __('messages.years')}}</th>
  </tr>
  <tr>
    <th style="text-align: left;">{{ __('messages.Class Strength')}}</th>
    <th colspan="2" style="text-align: right;">{{$course_details->class_size}}</th>
  </tr>
  <tr>
   </tr>
</table>
           
   <label style="text-align: left;font-weight: 700;font-size: 17px;">{{ __('messages.Description')}}</label>
    <div>{{$course_details->description}}</div>
                   
</div>
      <div class="modal-footer">
           <input class="btn btn-primary btn-block buy-button" type='button' id='btn' value='Print' onclick='printDiv();'>
      </div>
    </div>

  </div>
</div>
@endsection
@if(!count($batch_details))

<style type="text/css">
.buy-button{  
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
  }
</style>
@endif
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
.content-wrap.ii {
    padding-top: 0;
}
.modal-content {
    
    
    border: 8px solid #F1C22E !important;
}
@media only screen and (max-width: 600px) {
    .buy-button {
    width: 100% !important;
    margin-top: 10px;
    margin-bottom: 20px;
}
}
</style>

@section('script')
  <script type="text/javascript">
       $(document).ready(function() {
// var url = 'https://www.fitkids-kw.com/course_details/13';
// var id = url.substring(url.lastIndexOf('/') + 1);
// $.ajax({
//               url:"{{secure_url('customer/classdetails')}}?c_id="+course_id,
//               type: "GET",
//               dataType: "html",
//               success: function(response) 
//               { 
//                   console
//               }
         $('#buy-course-btn').click(function()
          {
            var course_id = $(this).attr('data-course_id');
            var price = $(this).attr('data-price');
            var batch_id = $('input[name="batch_id"]:checked').val();
            
            if(typeof batch_id === 'undefined'){
               toastr.info("Please select batch");
              return;    
            }
            
            $.ajax({
              url:"{{secure_url('customer/buy_detail')}}?c_id="+course_id+"&price="+price+"&batch_id="+batch_id,
              type: "GET",
              dataType: "html",
              success: function(response) 
              {
                var response = JSON.parse(response);
                if(response.result == true)
                {
                    toastr.success(response.message);
                   
                   setTimeout(function(){
                        window.location.href=response.data.paymenturl+response.data.token+response.data.ptype; 
                   },1500);
                   
                }else{
                    toastr.success(response.message);
                }
              },
              error: function(response)
              {
                    toastr.success(response.message);
                console.log(response);
              }       
            });
         });  

    }); 
     </script>
     @endsection

