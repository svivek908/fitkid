@extends('admin.layout.app')
@section('content')

    <!-- LOAD PAGE -->
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
  .col-sm-3
  {
    margin-right: 10px;
  } 
  @media (min-width: 768px){
  .col-sm-3
  {
   width: 32% !important;
  }
  button.btn.btn-success.btn-rounded {
    margin-top: 15px;
    float: left;
}
  }
  </style>
  @if(Request::segment(3) != '')
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">Attendence</h5>
        </div>
      </div>

      <!-- /Title --> 
      <!-- Row -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
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
                      @if(isset($mc))
                      <form action="{!! url('admin/update_leave', $mc->id ); !!}" method="POST" enctype="multipart/form-data">
                     @csrf
                         
                        
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Student name</label>
                              <div>
                                @if($student)
                                <select class="form-control" name="student_id">
                                @foreach($student as $stu)
                                <option value="{{$stu->id}}">{{$stu->name}}</option>
                                @endforeach
                                </select>
                                  
                                @endif
                                @if($errors->has('student_id'))
                                      <p class="error" >{{ $errors->first('student_id') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Date From</label>
                              <div>
                                <input type="date" name="date_from" class="form-control"  placeholder="">
                                @if($errors->has('date_from'))
                                      <p class="error" >{{ $errors->first('date_from') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         
                           <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Date To</label>
                              <div>
                                <input type="date" name="date_to" class="form-control">
                                 @if($errors->has('date_to'))
                                      <p class="error" >{{ $errors->first('date_to') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>

                   
                          
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Describe reason</label>
                              <div>
                                <textarea type="time" name="reason" class="form-control" placeholder="Close time"></textarea>
                                 @if($errors->has('reason'))
                                      <p class="error" >{{ $errors->first('reason') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          <div class="col-sm-12 col-xs-12 text-right">
                            <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i>Update </button>
                          </div>
                      </form>
                     @else
                      <form class="form-horizontal" method="POST" action="{!! url('admin/add_leave') !!}" enctype="multipart/form-data">
                          @csrf
                         <div>
                           <input type="hidden" name="batch_id" value="{{Request::segment(3)}}">
                         </div>
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Student name</label>
                              <div>
                                @if($student)
                                <select class="form-control" name="student_id">
                                @foreach($student as $stu)
                                <option value="{{$stu->id}}">{{$stu->name}}</option>
                                @endforeach
                                </select>
                                  
                                @endif
                                @if($errors->has('student_id'))
                                      <p class="error" >{{ $errors->first('student_id') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Date From</label>
                              <div>
                                <input type="date" name="date_from" class="form-control"  placeholder="" value="{{date('Y-m-d')}}"> 
                                @if($errors->has('date_from'))
                                      <p class="error" >{{ $errors->first('date_from') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         
                           <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Date To</label>
                              <div>
                                <input type="date" name="date_to" class="form-control" value="{{date('Y-m-d')}}">
                                 @if($errors->has('date_to'))
                                      <p class="error" >{{ $errors->first('date_to') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>

                   
                          
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Describe reason</label>
                              <div>
                                <textarea type="time" name="reason" class="form-control" placeholder="Close time"></textarea>
                                 @if($errors->has('reason'))
                                      <p class="error" >{{ $errors->first('reason') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          <div class="col-sm-12 col-xs-12 text-right" style="padding-left: 0">
                        <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i> Save </button>
                      </div>
                      </form>
                      @endif
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
  

    <!-- CONTENT -->
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">Attendence details</h5>
          
        </div>
      </div>
     
      <br>
     <div class="col-md-12 col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
              <div class="datatable-responsive table-responsive">
                <table id="simpletable" class="table  table-bordered nowrap dark">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Student name</th>
                      @if($start == 1)
                      @php $s_date=$data[0]->start_date; @endphp
                      @while(strtotime($s_date) <= strtotime($end_date))
                      <th>{{$s_date}}</th>
                      @php $s_date = date ("Y-m-d", strtotime("+1 days", strtotime($s_date))) @endphp
                      @endwhile
                      @endif
                      </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $pro)
                    <tr >
                      <td>{{ $pro->start_date }}</td>
                      <td>{{ $pro->sname}}</td>
                      @if($start == 1)
                      @php $start_date=$pro->start_date; @endphp
                      @while(strtotime($start_date) <= strtotime($end_date))
                      @foreach($abc as $abcd)
                      @foreach($abcd as $pro1)
                      @if($pro1->student_id == $pro->student_id)
                      @if($start_date >= $pro1->date_from && $start_date <= $pro1->date_to)
                          @php $acf='A'; $color='red'; break; @endphp
                      @else
                          @php $acf='P'; $color='green'; @endphp
                      @endif
                      @endif
                      @endforeach
                      @endforeach
                      <td style="text-align: center;background: 'red';font-weight: 900;"><b style="color: #fff">A</b></td>
                      @php $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date))) @endphp
                      @endwhile;
                      @endif;
                      </tr>
                    @endforeach
                    @endif
                    
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      <!-- /Row --> 
      </div>
@endif    
@endsection