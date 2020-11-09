 @extends('admin.layout.app')
  @section('content')
<style type="text/css">
  button.btn.btn-danger.btn-rounded {
      background: black !important;
      color: #fff !important;
      border-color: black;
  }
  .form-group.new-form-group {
      padding: 10px;
  }
  button.btn.btn-danger.btn-rounded a {
      color: #fff;
  }
/*  .input-field.col label {
    left: 39px;
    top: 19px;
*/
 span.remove {
   float: left;
   margin-left: -7px;
   margin-top: -15px;
   background: red;
   color: #fff;
   padding: 1px 5px 5px 4px;
   border-radius: 50%;
   height: 23px;
   position: relative;
   z-index: 999;
}
       .custom-control.custom-checkbox {
   float: left;
   margin-right: 5px;
   margin-left: 10px;
}
img.imageThumb {
   width: 90%;
   margin-top: 15px;
   float: left;
}
span.pip {
   float: left;
   width: 25%;
}
input#images {
    padding-top: 11px;
}
</style>
  <!-- Main Content -->
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="pa-10"> </div>
      <!-- /Title --> 
      <!-- Row -->
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
             <div class="row">
             <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark" style="padding-bottom: 8px;">EDIT PROFILE</h5>
        </div>
      </div>
          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="pull-left">
                <h6 class="panel-title txt-dark"></h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-wrap">
                      <form class="form-horizontal" id="product-form" method="POST" action="{!! url('admin/update_profile', $c->id ); !!}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $c->id }}">
                        
                        <div class="col-sm-4 col-xs-12">
                          <div class="form-group new-form-group">
                            <label class="control-label">Name</label>
                            <div>
                              <input type="text" name="name" class="form-control"  placeholder="Name" value="{{ old( 'name', $c->name) }}">
                                @if($errors->has('name'))
                                  <p class="error" >{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                          </div>
                        </div>
                       
                         <div class="col-sm-4 col-xs-12">
                          <div class="form-group new-form-group">
                            <label class="control-label">Email</label>
                            <div>
                              <input type="text" name="email" class="form-control"  placeholder="Email" value="{{ old( 'email', $c->email) }}">
                                @if($errors->has('email'))
                                  <p class="error" >{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-xs-12 jj">
                        <button class="btn  btn-success btn-rounded "><i class="mdi mdi-content-save  mr-5"></i> Update   </button>
                      </div>
                        <div class="col-md-4 col-xs-12" style="display: none;">
                          <div class="form-group">
                            <label  class="control-label">Profile Image</label>
                            <div>
                              <input type="file" name="image" id="image">
                                @if(isset($image))
                                @foreach($image as $img)
                                     <span class="pip"><img class="imageThumb" src=" {{asset('productsimage/').'/'.$img->image}}"><br><span class="remove remove_image" data-id="{{ $img->id }}" data-url="{{url('admin/detete_productImg')}}" data-image_source=""><i class="fa fa-times" aria-hidden="true"></i></span></span>
                                @endforeach
                               @endif
                               @if($errors->has('image'))
                                    <p class="error" >{{ $errors->first('image') }}</p>
                                  @endif
                            </div>
                          </div>  
                        </div>
                       <div class="col-md-12 col-xs-12">  
                          <div class="col-md-8  col-xs-12 text-right">
                           <!--  <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i> Update   </button> -->
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
      <!-- /Row --> 
    </div>
    @endsection
     @section('script')
     <script type="text/javascript">
      if (window.File && window.FileList && window.FileReader) {
       $("#images").on("change", function(e) {
         var files = e.target.files,
           filesLength = files.length;
         for (var i = 0; i < filesLength; i++) {
           var f = files[i]
           var fileReader = new FileReader();
           fileReader.onload = (function(e) {
             var file = e.target;
             $("<span class=\"pip\">" +
               "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" height=\"100\" width=\"100\"/>" +
               "<br/><span class=\"remove\"><i class='fa fa-times'></i></span>" +
               "</span>").insertAfter("#images");
             $(".remove").click(function(){
               $(this).parent(".pip").remove();
             });  
           });
           fileReader.readAsDataURL(f);
         }
       });
     } else {
       alert("Your browser doesn't support to File API")
     }
    
    $('body').on("click", ".remove_image", function(){
         var id = $(this).data('id');
         var urls = $(this).data('url');
         //var image_source = $(this).data('image_source');
         $(this).parent(".pip").remove();
          $.ajax({
                 type: "GET",
                 url: urls+'/'+id,
                 success: function(response) {
                 },
                 error:function(response)
                 {
                     
                 }
             });
        });

    $(document).ready(function() {
      $('#summernote').summernote();
      $("#product-form").validate({
          rules:{
            name:{
                  required:true,
              },
           email:{
                  required:true,
              },
           
          
          
          },
          messages:{
                 name:{
                  required:"Enter Product Name",
                    },
                 email:{
                        required:"Select main category", 
                    },
                
            },
        errorElement:'div',
      });

       }); 
     </script>
     @endsection
     <style>
       .jj
       {
        padding-top: 30px;
       }
       @media (max-width: 767px)
       {
        .jj
        {
          padding-top: 0
        }
       }
     </style>