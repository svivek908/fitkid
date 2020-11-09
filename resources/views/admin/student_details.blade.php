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
          <h5 class="txt-dark">Course Details</h5>
        </div>
      </div>
      <!-- /Title --> 

      <!-- Row -->
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="pull-left">
                <h6 class="panel-title txt-dark">Course summary</h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="datatable-responsive table-responsive">
                  <table id="simpletable" class="table  table-bordered nowrap dark ma-0">
                    <thead>
                      <tr>
                        <th>Course ID</th>
                        <th>Name</th>
                        <th>Fees</th>
                        <th>Paid On</th>
                        
                        <!--<th> </th>-->
                      </tr>
                    </thead>
                    <tbody>
          @if(isset($course))
                  
                 @foreach($course as $k =>$v)  
                 
                      <tr >
                        <td>{{++$k}}</td>
                        <td class="vertical-align-middle">
                          <div class="pull-left pa-10">{{$v->name}}</div></td>
                        <td>{{$v->price}}</td>
                        <td>{{$v->paid_on}}</td>
                        <!--<td class="text-center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Edit"><i class="mdi mdi-lead-pencil font-18 txt-primary"></i></a> &nbsp; <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-close txt-danger font-18"></i></a></td>-->
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
          <div class="row"></div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">Payment Details</h6>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table ma-0">
                        <tr>
                          <td class="boder-0">Transaction ID: <span class="text-color"></span></td>
                        </tr>
                        <tr>
                          <td class="boder-0">Amount: <span class="text-color"></span></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12" style="width: 50%;">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">Total </h6>
                  </div>
                  <div class="clearfix"> 0</div>
                </div>
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table ma-0">
                        <tr>
                          <td class="boder-0">Subtotal Price</td>
                          <td class="boder-0"> 0</td>
                        </tr>
                        <tr>
                          <td class="boder-0"><strong class="text-color">Total price</strong></td>
                          <td class="boder-0"><strong class="text-color"></strong></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="pull-left">
                <h6 class="panel-title txt-dark">Customer Details</h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td class="text-color">{{$data->name}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td class="text-color">{{$data->email}}</td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td class="text-color">{{$data->mobile}}</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td class="text-color">{{$data->gender}}</td>
                      </tr>
                      <tr>
                        <td>Education</td>
                        <td class="text-color">{{$data->education}}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td class="text-color">{{$data->address}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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