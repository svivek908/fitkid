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
    button.btn.btn-success.btn-rounded {
    margin-top: 15px;
    FLOAT: LEFT;
}
</style>
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h5 class="txt-dark" style="float: left;">Batches</h5>
        </div>
    </div>

    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
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
                                    <form action="{!! url('admin/update_batch', $mc->id ); !!}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Select Course</label>
                                                <div>
                                                 <select class="form-control" name="course_id">
                                                   @if($course)
                                                   
                                                   @foreach($course as $key=>$val)
                                                   
                                                   
                                                   <option value="{{$val->id}}" {{ ( $mc->course_id == $val->id) ? 'selected' : '' }}>{{ $val->name }}</option>
                                                   @endforeach
                                                   @endif
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                  
                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Open time</label>
                                                <div>
                                                    <input type="datetime" name="open_time" class="form-control" value="{{$mc->open_time}}"> @if($errors->has('open_time'))
                                                    <p class="error">{{ $errors->first('open_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Close time</label>
                                                <div>
                                                    <input type="datetime" name="close_time" class="form-control" value="{{$mc->close_time}}"> @if($errors->has('close_time'))
                                                    <p class="error">{{ $errors->first('close_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Start date</label>
                                                <div>
                                                    
                                                    <input type="date" name="start_date" class="form-control"  value="{{$mc->start_date}}"> @if($errors->has('start_date'))
                                                    <p class="error">{{ $errors->first('start_date') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">End date</label>
                                                <div>
                                                    <input type="date" name="end_date" class="form-control"  value="{{$mc->end_date}}"> @if($errors->has('end_date'))
                                                    <p class="error">{{ $errors->first('end_date') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Class strength</label>
                                                <div>
                                                    <input type="number" name="class_size" class="form-control"  value="{{$mc->class_size}}"> @if($errors->has('class_size'))
                                                    <p class="error">{{ $errors->first('class_size') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            @php  $days = array();
                                                if($mc->days){
                                                  $days = explode(',',$mc->days);
                                                }
                                            @endphp
                                            <div class="form-group"><input type="checkbox" id="check-all-days" >
                                                <label class="control-label">Days</label>
                                                <div  class="row col-md-12" >
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Monday" <?=(in_array('Monday',$days))?'Checked':''?>  > <span>Monday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Tuesday" <?=(in_array('Tuesday',$days))?'Checked':''?>  ><span>Tuesday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Wednesday" <?=(in_array('Wednesday',$days))?'Checked':''?> ><span>Wednesday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Thursday" <?=(in_array('Thursday',$days))?'Checked':''?> ><span>Thursday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Friday" <?=(in_array('Friday',$days))?'Checked':''?> ><span>Friday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Saturday" <?=(in_array('Saturday',$days))?'Checked':''?> ><span>Saturday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Sunday" <?=(in_array('Sunday',$days))?'Checked':''?> ><span>Sunday </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-xs-12 text-right">
                                            <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i>Update </button>
                                        </div>
                                    </form>
                                    @else
                                    <form class="form-horizontal" method="POST" action="{!! url('admin/add_batch') !!}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Select Course</label>
                                                <div>
                                                 <select class="form-control" name="course_id">
                                                   @if($course)
                                                   @foreach($course as $key=>$val)
                                                   <option value="{{$val->id}}">{{$val->name}}</option>
                                                   @endforeach
                                                   @endif
                                                 </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Open time</label>
                                                <div>
                                                    <input type="time" name="open_time" class="form-control" > @if($errors->has('open_time'))
                                                    <p class="error">{{ $errors->first('open_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Close time</label>
                                                <div>
                                                    <input type="time" name="close_time" class="form-control" > @if($errors->has('close_time'))
                                                    <p class="error">{{ $errors->first('close_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Start date</label>
                                                <div>
                                                    <input type="date" name="start_date" class="form-control" > @if($errors->has('start_date'))
                                                    <p class="error">{{ $errors->first('start_date') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">End date</label>
                                                <div>
                                                    <input type="date" name="end_date" class="form-control" > @if($errors->has('end_date'))
                                                    <p class="error">{{ $errors->first('end_date') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Class strength</label>
                                                <div>
                                                    <input type="number" name="class_size" class="form-control" > @if($errors->has('class_size'))
                                                    <p class="error">{{ $errors->first('class_size') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group"><input type="checkbox" id="check-all-days" >
                                                <label class="control-label">Days</label>
                                                <div  class="row col-md-12" >
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Monday"  ><span>Monday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Tuesday"  ><span>Tuesday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Wednesday"  ><span>Wednesday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Thursday"  ><span>Thursday</span> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Friday"  ><span>Friday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Saturday"  ><span>Saturday </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="days[]" value="Sunday"  ><span>Sunday </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 text-left" style="padding-left: 0">
                                            <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i> Save </button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-8">
            <div class="panel panel-default card-view">

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="datatable-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>

                                        <th>Batch Id</th>
                                        <th>Course Name</th>
                                        <th>Open time</th>
                                        <th>Close time</th>
                                        <th>Expire in</th>
                                        <th>Class Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data) @foreach($data as $mc)
                                    <tr>

                                        <td>{!! $mc->id; !!}</td>
                                        <td>{!! $mc->cname; !!}</td>
                                        <td>{!! $mc->open_time; !!}</td>
                                        <td>{!! $mc->close_time; !!}</td>
                                        <td>{!! $mc->expiry_day; !!}</td>
                                        <td>{!! $mc->class_size; !!}</td>
                                      
                                        <td>
                                            <a href="https://www.fitkids-kw.com/admin/edit_batch/{{$mc->id}}">
                                         <i class="fa fa-pencil data-table-edit" data-id="{!! $mc->id; !!}" data-editurl="https://www.fitkids-kw.com/admin/edit_batch" title="Edit"> </i></a>
                                         
                                         
                                         <a href="https://www.fitkids-kw.com/admin/view-batch/{{$mc->id}}">
                                         <i class="fa fa-eye  data-table-edit" data-id="{!! $mc->id; !!}" data-editurl="https://www.fitkids-kw.com/admin/view-batch" title="View Batch Details"></i></a>
                                         
                                         <a href="https://www.fitkids-kw.com/admin/delete_batch/{{$mc->id}}">
                                         <i class="fa fa-trash delete"   data-redirecturl="https://www.fitkids-kw.com/admin/batch" title="Delete"> </i></a>
                                         <!--<i class="fa fa-trash delete" data-id="{!! $mc->id; !!}" data-url="https://www.fitkids-kw.com/admin/delete_batch" data-redirecturl="https://www.fitkids-kw.com/admin/batch" title="Delete"> </i>-->
                                         
                                         <a href="https://www.fitkids-kw.com/admin/attend_batch/{{$mc->id}}"><i class="fa fa-clock-o"></i>
                                             
                                        <!--<i class="fa fa-clock-o" data-id="{!! $mc->id; !!}" data-url="https://www.fitkids-kw.com/admin/attend_batch" data-redirecturl="https://www.fitkids-kw.com/admin/batch" title="Attendence"> </i>--></a>
                                        </td>
                                    </tr>
                                    @endforeach @endif
                                </tbody>
                                <!--<tfoot>-->
                                <!--    <tr>-->
                                <!--         <th>Batch Id</th>-->
                                <!--        <th>Course Name</th>-->
                                <!--        <th>Open time</th>-->
                                <!--        <th>Close time</th>-->
                                <!--        <th>Expire in</th>-->
                                <!--        <th>Class Size</th>-->
                                <!--        <th>Action</th>-->
                                <!--    </tr>-->
                                <!--</tfoot>-->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    table.dataTable.nowrap th, table.dataTable.nowrap td {
    white-space: unset!important;
    width: unset;
}
.form-group .col-md-4 {
    padding-left: 0px;
    padding-right: 0px;
}
.form-group .col-md-4 span {
    padding-left: 6px;
}
</style>

@section('script')
<script>
    $("body").on('click','#check-all-days',function(){
           
           if($(this).is(':checked')){
               $('input[name="days[]"]').prop('checked',true);
           }else{
               $('input[name="days[]"]').prop('checked',false);
           }
        
    });
</script>

@endsection

