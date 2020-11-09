<!DOCTYPE html >
<!--<html {{ app()->getLocale() }}>-->
<html @if(Config::get('app.locale') == 'ar') dir="rtl" @else dir="ltl" @endif>
  <head>
   
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FitKid</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-touch-icon-114x114.png') }}">
    
    <!-- ==============================================
    CSS VENDOR
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    
</head>

<body>
  <div class="animationload">
        <div class="loader"></div>
    </div>
    
    <!-- BACK TO TOP SECTION -->
    <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

 
        @include('header')
            @yield('content')
        @include('footer')
        
  


   
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="{{ URL::asset('front-site-assets/js/jquery.validate.min.js') }}"></script>
    <!-- JS VENDOR -->
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.magnific-popup.min.js') }}"></script>

    <!-- SENDMAIL -->
    <script src="{{ asset('js/vendor/validator.min.js') }}"></script>
    <script src="{{ asset('js/vendor/form-scripts.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <!-- GOOGLEMAP -->
   <!--  <script src="{{ asset('js/googlemap-setting.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap"> </script> -->
    <!-- AIzaSyA4EvMrcuKiIbha4Ux2EV3kI62HlHz7bQc -->
   @yield('script')

<script type="text/javascript">
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
</body>
</html>
