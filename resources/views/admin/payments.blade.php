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
          <h5 class="txt-dark" style="float: left;">Payment</h5>
          
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
                      <th>Sr No</th>
                      <th>Student ID</th>
                      <th>Course ID</th>
                      <th>Price</th>
                      <th>Payment ID</th>
                      <th>Status</th>
                      <th>Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $k => $pro)
                    <tr >
                      <td>{{++$k}}</td>
                      <td>{{ $pro->login_id }}</td>
                      <td>{{ $pro->course_id }}</td>
                      <td>{{ $pro->price }}</td>
                      <td>{{ $pro->payment_id }}</td>
                      <td>{{ $pro->status }}</td>
                      <td>{{ $pro->created_at }}</td>
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
            $.ajax({
              url:"{{url('admin/change_student_status')}}?m_id="+mid+"&c_id="+cid,
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