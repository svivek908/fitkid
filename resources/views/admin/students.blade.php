 @extends('admin.layout.app')
  @section('content')
  @if(session()->has('message'))
        <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>            
  @endif
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">Students</h5>
          
        </div>
      </div>
     
      <br>
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
              <div class="datatable-responsive table-responsive">
                <table id="simpletable" class="table  table-bordered nowrap dark">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Course ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Education</th>
                   <!--    <th>Created Date</th> -->
                      <th >Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $pro)
                    <tr >
                      <td>{{ $pro->id }}</td>
                      <td>@if($pro->course_id > 0){{ $pro->course_id }} @else {{'-'}} @endif</td>
                      <td>{{ $pro->name }}</td>
                      <td>{{ $pro->email }}</td>
                      <td>{{ $pro->mobile }}</td>
                      <td>{{ $pro->gender }}</td>
                      <td>{{ $pro->address }}</td>
                      <td>{{ $pro->education }}</td>
                     <!--  <td>{{ $pro->created_at }}</td> -->
                      <td >
                        <select class="form-control" id="order_status" style="width: -webkit-fill-available !important" data-id="{{$pro->id}}">
                          <option {{ $pro->status == 'Pending' ? 'selected'  : ''}} value='Pending'>Pending</option>
                          <option {{ $pro->status == 'Approved' ? 'selected'  : ''}} value='Approved'>Approved</option>
                          <option {{ $pro->status == 'Disabled' ? 'selected'  : ''}} value='Disabled'>Disabled</option>
                        </select>

                      </td>
                      <td class="text-center"><a href="https://www.fitkids-kw.com/admin/view-student/{{$pro->id}}">
                           <i class="fa fa-eye font-18 txt-primary data-table-edit"  style="cursor: pointer;"></i>
                          </a><a href="https://www.fitkids-kw.com/admin/delete_student/{{$pro->id}}">
                                         <i class="fa fa-trash delete"   data-redirecturl="https://www.fitkids-kw.com/admin/batch" title="Delete"> </i></a></td>
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
      <!-- /Row --> 
    </div>
    @endsection
  @section('script')
  <script type="text/javascript">
       $(document).ready(function() {

         $('body').on('change','#order_status',function()
          {
            var mid = $(this).attr('data-id');
            var cid = $(this).val();
            //var base_url = '<?php echo url('/'); ?>';
             //alert(base_url);
            $.ajax({
              url:"https://www.fitkids-kw.com/admin/change_student_status?m_id="+mid+"&c_id="+cid,
              type: "GET",
              dataType: "html",
              success: function(response) 
              {
                
                  if(response.result == true)
                  {
                    location.reload();
                  }
              },
              error: function(response)
              {
                  
                console.log(response);
              }       
            });
         });  });
  </script>
  @endsection
  <style >
    .heading-bg {
    height: 45px;
    margin: 0 -20px 10px;
    padding: 13px 0 0;
    margin-bottom: -9px!important;
}
  </style>