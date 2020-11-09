 @extends('admin.layout.app')
  @section('content')
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Change Password</h5>
        </div>
        <!-- Breadcrumb -->
       <!--  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li class="active"><span>Change Password</span></li>
          </ol>
        </div> -->
        <!-- /Breadcrumb --> 
      </div>
      <!-- /Title --> 
		   @if(session()->has('message'))
             <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>
   @elseif(session()->has('emessage'))
             <div class="alert alert-danger">
                 {{ session()->get('emessage') }}
             </div>
   @endif
      <!-- Row -->
      <div class="row">
       
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
              <div class="panel-body pt-0 timeline"> 
                
                <div class="tab-content pt-10">
                  <!--second tab-->
                  
                  <div>
                    <div class="card-body">

						<form class="form-horizontal form-material" id="user-edit-form" method="POST" action="{!! url('admin/admin_update_password','1'); !!}" >
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-md-12">Current password</label>
                          <div class="col-xs-12">
                            <input type="password" name="current_password"  class="form-control form-control-line">
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
						<div class="form-group">
                          <label class="col-md-12">New password</label>
                          <div class="col-xs-12">
                            <input type="password" id="new_password" name="new_password"  class="form-control form-control-line">
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
						<div class="form-group">
                          <label class="col-md-12">Confirm password</label>
                          <div class="col-xs-12">
                            <input type="password" name="confirm_password"  class="form-control form-control-line">
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">

                          <div class="col-sm-12 ii">
                            <button class="btn btn-success">Update Password</button>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row --> 
    </div>
    @endsection

	@section('script')
     <script type="text/javascript">
		 
 $(document).ready(function() {
      $("#user-edit-form").validate({
          rules:{
            current_password:{
                  required:true,
              },
            new_password:{
                  required:true, 
              },
            confirm_password:{
                  required:true, 
				 equalTo:"#new_password" 
              },
          },
          messages:{
                 current_password:{
                  required:"Enter current password",
                    },
                 new_password:{
                        required:"Enter new password", 
                    },
                 confirm_password:{
                        required:"Enter confirm password", 
                        equalTo:"confirm password not match", 
                    }, 
            },
        errorElement:'div',
      });
       }); 
     </script>
     @endsection
     <style >
      .ii
      {
        padding-top: 20px
      }
      label
      {
        color: #212121
      }
      @media (max-width: 767px)
      {
        .ii
        {
          padding-top: 0
        }
      }
     </style>