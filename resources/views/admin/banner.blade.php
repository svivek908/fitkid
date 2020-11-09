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
          <h5 class="txt-dark" style="float: left;">Banners</h5>
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
                      <form action="{!! url('admin/update_banner', $mc->id ); !!}" method="POST" enctype="multipart/form-data">
                     @csrf
                         
                          <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Title</label>
                              <div>
                                <input type="text" name="title" value="{{ old( 'title', $mc->title) }}" class="form-control"  placeholder="Title only for home page slider Banner">
                                 @if($errors->has('title'))
                                      <p class="error" >{{ $errors->first('title') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                      
                          
                           <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Image</label>><span style="font-size: 12px;
    margin-left: 10px;">(Size 1024x474 pixels)</span>
                              <div>
                                <input type="file" name="image">
                                 @if($errors->has('image'))
                                      <p class="error" >{{ $errors->first('image') }}</p>
                                    @endif
                              </div>
                            </div>  
                            <img height="150" src="{{asset('admin-assets/Banner/').'/'.$mc->image}}">
                            
                        </div> 
                      
                          <div class="col-sm-12 col-xs-12 text-right">
                            <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i>Update </button>
                          </div>
                      </form>
                     @else
                      <form class="form-horizontal" method="POST" action="add_banner" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Title</label>
                              <div>
                                <input type="text" name="title" class="form-control"  placeholder="Title for home page slider Banner" required="">
                                 @if($errors->has('title'))
                                      <p class="error" >{{ $errors->first('title') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         
                           <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Images</label><span style="font-size: 12px;
    margin-left: 10px;">(Size 1024x474 pixels)</span>
                              <div>
                                <input type="file" name="image" required="">
                                 @if($errors->has('image'))
                                      <p class="error" >{{ $errors->first('image') }}</p>
                                    @endif
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
                  <table id="simpletable"class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $mc)
                        <tr>
                           
                           <td>{!! $mc->title; !!}</td>
                           <td><img src=" {{asset('/admin-assets/Banner/').'/'.$mc->image}}" alt="" title="" height="100" style="width: 60px"></td>
                           <td>
                            <i class="fa fa-pencil data-table-edit" data-id="{!! $mc->id; !!}" data-editurl="{{url('admin/edit_banner')}}" title="Edit"> </i>
                            <i class="fa fa-trash delete" data-id="{!! $mc->id; !!}" data-url="{{url('admin/delete_banner')}}" data-redirecturl="{{url('admin/banner')}}" title="Delete"> </i> 
                         </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>Main Title</th>
                        <th>Image</th>
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