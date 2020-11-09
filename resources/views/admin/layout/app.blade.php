<html lang="">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>FitKid|admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<link href="{{ asset('admin-assets/vendors/bower_components/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/vendors/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/assets/css/default.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link href="{{ URL::asset('admin-assets/assets/summernote/dist/summernote.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('front-site-assets/css/tokenize2.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet" />
<style type="text/css">


.goog-te-gadget-icon {display:none;}
.goog-te-gadget-simple a {text-decoration: none !important;}
.goog-te-banner-frame.skiptranslate {display: none !important;}
</style>
</head>
<body>
  
	<div class="wrapper light-theme"> 
        @include('admin.top-header')
        @include('admin.sidebar')
        @include('admin.right-sidebar')
        <div class="page-wrapper">
            @yield('content')
        	@include('admin.footer')
        </div>
  	</div>
<script src="{{ asset('admin-assets/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script> 
<script src="{{ asset('admin-assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('front-site-assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('front-site-assets/js/additional-methods.min.js') }}"></script>
<script src="{{ URL::asset('front-site-assets/js/sweetalert2.all.js') }}"></script>
<script src="{{ URL::asset('admin-assets/assets/summernote/dist/summernote.js') }}"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@yield('script')
<script type="text/javascript">
	$(document).ready( function () {
    $('#simpletable').DataTable();
          // on click event for edit client 
   $('.data-table-edit').on('click',function(){
      var ids = $(this).data('id');
      var url = $(this).data('editurl');
      window.location.href = url+'/'+ids;
    });

   	// on click event for delete client 
       $('.delete').on('click',function(){
          var id = $(this).data('id');
          var url_hit = $(this).data('url');
          var redirecturl = $(this).data('redirecturl');
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this record.",
              type: 'warning',
              showCancelButton: true,
              cancelButtonText: "No, cancel it!",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Yes, delete it!"
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      type:"GET",
                      url: url_hit+'/'+id,
                       success:function(res){               
                       //   swal("Deleted!", "Your imaginary file has been deleted.", "success");
                      },            
                      error:function(response){                
                      },          
                  }).then(function(){
                      window.location.href = redirecturl; 
                  }); 
              }
          });
        });

        $('#main_cate_id').on('change',function(){
        var main_cate_id = $(this).val();    
        if(main_cate_id){
            $.ajax({
               type:"GET",
               url:"{{url('api/get-cate')}}?id="+main_cate_id,
               success:function(res){               
                if(res){
                    $("#cate_id").empty();
                     $("#cate_id").append('<option value="">Select Sub Category</option>');
                    $.each(res,function(key,value){
                        $("#cate_id").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#cate_id").empty();
                }
               }
            });
        }else{
            $("#cate_id").empty();
        }  
       });
 

} );
</script>
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'fr', includedLanguages: 'en,es,fr,it,nl,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script> -->
</body>
</html>
