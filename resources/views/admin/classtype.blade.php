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
  </style>
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">Class Type</h5>
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
                      <form action="{!! url('admin/update_classtype', $mc->id ); !!}" method="POST" enctype="multipart/form-data">
                     @csrf
                         <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Class type</label>
                              <div>
                                <input type="text" name="type" placeholder='Put type here' class="form-control" value='{{$mc->type}}'>
                                 @if($errors->has('type'))
                                      <p class="error" >{{ $errors->first('type') }}</p>
                                    @endif
                              </div>
                            </div>  
                           <!-- <img height="150" src="{{asset('admin-assets/classtype/').'/'.$mc->image}}">
                        -->  
                        </div> 
                   
                          <div class="col-sm-12 col-xs-12 text-right">
                            <button class="btn  btn-success"><i class="mdi mdi-content-save  mr-5"></i>Update </button>
                          </div>
                      </form>
                     @else
                      <form class="form-horizontal" method="POST" action="add_classtype" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Class type</label>
                              <div>
                                <input type="text" name="type" class="form-control"  placeholder='Put type here'>
                                 @if($errors->has('type'))
                                      <p class="error" >{{ $errors->first('type') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          <div class="col-sm-12 col-xs-12 text-left" style="padding-left: 0">
                        <button class="btn  btn-success" ><i class="mdi mdi-content-save  mr-5"></i> Save </button>
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
                  <table id="simpletable"class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        
                
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $mc)
                        <tr>
                           
                         
                           <td>{{$mc->type}}</td>
                           <td>
                            <i class="fa fa-pencil data-table-edit" data-id="{!! $mc->id; !!}" data-editurl="{{url('admin/edit_classtype')}}" title="Edit"> </i>
                            <i class="fa fa-trash delete" data-id="{!! $mc->id; !!}" data-url="{{url('admin/delete_classtype')}}" data-redirecturl="{{url('admin/classtype')}}" title="Delete"> </i> 
                         </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                      <tr>
                     
                        <th>Type</th>
                        <th>Action</th>
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
<style>
  button.btn.btn-success {
    float: left;
    margin-top: 10px;
}
</style>