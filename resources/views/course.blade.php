@extends('layout.app')
@section('content')
  <?php 
   use App\Http\Controllers\HomeController;
        $user = HomeController::get_user();
        ?>
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
        .btn-secondary:hover {
    background-color: #fc1e0e;
    color: #ffffff!important;
}
  </style>
  <!-- BANNER -->
    <div class="section banner-page" data-background="{{asset('images/courcess.png')}}">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">{{ __('messages.Courses')}}</div>
            </div>
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('messages.Home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.Courses')}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- OUR ARTICLES -->
    <div class="">
        <div class="content-wrap">
            <form method="get">
            <div class="container">
                <div class="form-group" style="width: 25%;float: left;margin-right: 12px;">
                <label>{{ __('messages.Gender')}}</label>
                <select class="form-control" name="gender">
                   <option value="boy">{{ __('messages.boy')}}</option> 
                     <option value="girl">{{ __('messages.girl')}}</option>
                       <option value="unisex">{{ __('messages.unisex')}}</option>
                </select>
                </div>
                <div class="form-group" style="width: 25%;float: left;margin-right: 12px;">
                <label>{{ __('messages.Class Type')}}</label>
                <select class="form-control" name="class_type">
                    @if($class_type)
                    @foreach($class_type as $ct)
                   <option value="{{$ct->type}}">{{$ct->type}}</option> 
                    @endforeach
                    @endif        
                </select>
                </div>
                <div  class="form-group"  style="width: 44%;float: left;margin-right: 12px; margin-top:2%;">
                <button class="btn btn-secondary bb">{{ __('messages.Submit')}}</button>
                </div>
            </div>
            </form>
            <div class="container" style="float:left; width:100%;">

                <div class="row mt-4">
                    @if($course)
                    @foreach($course as $key=>$courses)
                    <!-- Item {{$key}} -->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="rs-class-box mb-5">
                            <div class="media-box">
                                <img src="{{asset('admin-assets/course').'/'.$courses->image}}" alt="" class="img-fluid">
                            </div>
                            <div class="body-box">
                                <div class="class-name">
                                    <div class="title">{{$courses->name}}</div>
                                    <div class="price">{{$courses->fees}}&nbsp;KD</div>
                                </div>
                            
                                 <div class="open-class">
                               <!--  <a class="btn btn-secondary @if($user){{'details'}}@endif" data-course_id='{{$courses->id}}'>Buy now</a> -->
                                <a href="{{url('course_details').'/'.$courses->id}}" class="btn btn-secondary bb" style="min-width: 160px;">{{ __('messages.More details')}}</a>
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

            </div>
        </div>
    </div>

<div class="modal" id="prizePopup" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-contact" action="{{route('add_student_batch')}}" method="POST" id="course_buy" onsubmit="return false;">
      @csrf 
      <div class="modal-header">
        <h5 class="modal-title">{{ __('messages.Class time')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="slot_heading">{{ __('messages.Please select time')}}</p>

        <input type="hidden" name="course_id" class="course_id">
        <div id="time_slot">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('messages.Save changes')}}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.Close')}}</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
 @section('script')
  <script type="text/javascript">
       $(document).ready(function() {

         $('.details').click(function()
          {
            var mid = $(this).attr('data-course_id');
            $.ajax({
              url:"{{url('customer/get_course_detail')}}?c_id="+mid,
              type: "GET",
              dataType: "html",
              success: function(response) 
              {
                var myJSON = JSON.parse(response);
                  if(myJSON.result == true)
                  {
                    $('#time_slot').empty();
                    if(myJSON.data.length != 0){ 
                    $('#slot_heading').show();
                    $.each(myJSON.data, function( key, value ) {
                    $('#time_slot').append('<div><input type="radio" name="batch_id" value="'+value.id+'"><span style="color: #000;margin-left:5px;">'+value.open_time+'-'+value.close_time+'</span></div>')
                    });
                    }
                    else
                    {
                      $('#slot_heading').hide();
                      $('#time_slot').append('<div><span style="color: #000;margin-left:5px;">No time slot available for this course</span></div>')
                    }
                  $('.course_id').val(myJSON.course_id);
                  $('#prizePopup').modal('show');
                }
              },
              error: function(response)
              {
                console.log(response);
              }       
            });
         });  
      $("#course_buy").validate({
           rules: {
               
            },
             messages: {

            },
            submitHandler: function(a) {
            
                $.ajax({
                    type: "POST",
                    url:"{{route('add_student_batch')}}",
                    data: $(a).serialize(),
                    success: function(a) {
                    if(a.result == true)
                    { 
                        console.log(404);
                    }
                   },
                    error: function(a) {
                     
                    }
                })
            }
        })
    }); 
     </script>
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
    .form-group {
    width: 100% !important;
}
    }
    .footer {
    background-color: #F1C22E;
    color: #ffffff;
    background-size: cover;
    background-position: center;
    float: left;
    width: 100%;
}
.bg-tertiary {
    background-color: #16C3B0 !important;
    float: left;
    width: 100%;
}

</style>