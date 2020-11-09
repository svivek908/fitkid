 @extends('admin.layout.app')
  @section('content')
  <style type="text/css">
    .card-view.panel.panel-default>.panel-heading, .card-view.panel>.panel-heading .pull-right button
      {
        display: inherit;
      }
  </style>
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark">Dashboard</h5>
        </div>
      </div>
      <!-- /Title --> 
      <!-- Row -->
      <div class="row">
        
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default card-view card__view">
            <div class="panel-heading" style="margin: 0px;">
              <div class="pull-left">
                <h6 class="panel-title txt-dark" style="line-height:35px;"><a href="{{url('admin/trainee')}}">Students</a></h6>
              </div>
                 <div class="pull-right text-css"><span>{{$count_students}}</span></div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body" style="padding: 0px!important;">
                <div id="sparkline10"></div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default card-view card__view">
            <div class="panel-heading" style="margin: 0px;">
              <div class="pull-left">
                <h6 class="panel-title txt-dark" style="line-height:35px;"><a href="{{url('admin/course')}}">Courses</a></h6>
              </div>
               <div class="pull-right text-css"><span>{{$count_courses}}</span> </div>
              <div class="clearfix"></div>
            </div>
           
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default card-view card__view">
            <div class="panel-heading" style="margin: 0px;">
              <div class="pull-left">
                <h6 class="panel-title txt-dark" style="line-height:35px;"><a href="{{url('admin/batch')}}">Batches</a></h6>
              </div>
               <div class="pull-right text-css"><span>{{$count_batch}}</span> </div>

              <div class="clearfix"></div>
            </div>
           
          </div>
        </div>
      </div>
    
      <div class="row">
       
        <div class="col-lg-12 col-xs-12 " style="width: 99%;">
          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="pull-left">
                <h6 class="panel-title txt-dark">Students</h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper">
              <div class="panel-body row pa-0 pb-20">
                <div class="table-wrapper">
                  <div class="table-responsive">
                    <table id="simpletable" class="table  table-bordered nowrap dark">
                  <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Education</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $pro)
                    <tr >
                      <td>{{ $pro->id }}</td>
                      <td>{{ $pro->name }}</td>
                      <td>{{ $pro->email }}</td>
                      <td>{{ $pro->mobile }}</td>
                      <td>{{ $pro->gender }}</td>
                      <td>{{ $pro->address }}</td>
                      <td>{{ $pro->education }}</td>
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
          </div>
        </div>
      </div>
    </div>
    @endsection
