  @extends('admin.layout.app')
  @section('content')
  <style type="text/css">
    button.btn.btn-danger.btn-rounded {
      background: black !important;
      color: #fff !important;
      border-color: black;
  }
  button.btn.btn-danger.btn-rounded a {
      color: #fff;
  }
  input[type=file]
  {
    margin-top: 0px; 
    width: 100%
  }
textarea.form-control
{
  width: 98%;
} 
  @media (min-width: 768px){
  
  button.btn.btn-success.btn-rounded {
    margin-top: 15px;
    float: left;
}
  }
  </style>
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;"><a class="btn btn-success" href="{{url('admin/report')}}">Monthly Report</a></h5>
          <h5 class="txt-dark" style="float: left;margin-left: 5px;"><a class="btn btn-success" href="{{url('admin/quaterly_report')}}">Quaterly Report</a></h5>
          <!--<h5 class="txt-dark" style="float: left;margin-left: 5px;"><a class="btn btn-success" href="{{url('admin/quaterly_report')}}">Class Report</a></h5>-->
          <h5 class="txt-dark" style="float: left;margin-left: 5px;"><a class="btn btn-success" href="{{url('admin/student_report')}}">Student Report</a></h5>
           <h5 class="txt-dark" style="float: left;margin-left: 5px;"><a class="btn btn-success" href="{{url('admin/class_report/'.$course[0]['id'])}}">Courses</a></h5>
<!--          <div class="dropdown" style="display: inline-block; padding-top: 6px;">-->
<!--  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"  style="float: left;margin-left: 5px; background: #060a18;-->
<!--    color: #fff !important;-->
<!--    border: #ffffff00;-->
<!--    padding: 10px 25px;">Courses-->
<!--  <span class="caret"></span></button>-->
<!--  <ul class="dropdown-menu" style="min-width: 100%; margin: 2px 1px 0;">-->
      
<!--      @foreach($course as $user)-->
<!--      <li><a href="{{url('admin/class_report/'.$user['id'])}}">{{$user['name']}}</a></li>-->
<!--      @endforeach-->
    
    <!--<li><a href="#">CSS</a></li>-->
    <!--<li><a href="#">JavaScript</a></li>-->
<!--  </ul>-->
<!--</div>-->
        </div>
      </div>

      <!-- /Title  --> 
      <!-- Row -->
      <div class="row">
      <!--   <div class="col-md-12 col-xs-12">
          <div class="panel panel-default card-view">
           
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                     @if(session()->has('message'))
             <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>
                 @elseif(session()->has('emessage'))
                           <div class="alert alert-danger">
                               {{ session()->get('emessage') }}
                           </div>
                 @endif
                    <div class="form-wrap">
                     
                      <form  method="POST" action="{!! url('admin/add_course') !!}" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <div>
                                <input type="text" name="name" class="form-control"  placeholder="Course name">
                                @if($errors->has('name'))
                                      <p class="error" >{{ $errors->first('name') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Fees</label>
                              <div>
                                <input type="number" name="fees" class="form-control"  placeholder="Fees">
                                @if($errors->has('fees'))
                                      <p class="error" >{{ $errors->first('fees') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         
                     
                          
                          <div class="col-sm-12 col-xs-12 text-right" style="padding-left: 0">
                        <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i> Save </button>
                      </div>
                      </form>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      -->
        <div class="col-md-12">
          <div class="panel panel-default card-view">
          
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="datatable-responsive table-responsive">
               
                  
                  <table id="simpletable1" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th> Name</th>
<th> Email</th>
<th> Mobile</th>
<th> Gender</th>
<th> Education</th>
<th> Course</th>
<th> Course time</th>

</tr>
</thead>
                    <tbody>
                       
                        @if($data)
                        @foreach($data as $user)
<tr>

<td>{{ $user->name}}</td>
<td>{{ $user->email}}</td>
<td>{{ $user->mobile}}</td>
<td>{{ $user->gender}}</td>
<td>{{ $user->education}}</td>
<td>{{ $user->course}}</td>
@if(!empty($user->time))
<td>{{ $user->time}} To {{ $user->endtime}}</td>
@else
<td></td>
@endif
</tr>
 @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                      <tr>
<th> Name</th>
<th> Email</th>
<th> Mobile</th>
<th> Gender</th>
<th> Education</th>
<th> Course</th>
<th> Course time</th>
                      </tr>
                    </tfoot>

</table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script type="text/javascript">
  $('#simpletable1').DataTable( {
    dom: 'Bfrtip',
    buttons: [
         'excel'
    ]
} );
</script>
@endsection
