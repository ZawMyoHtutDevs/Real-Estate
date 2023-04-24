<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title>Lisiting Agency - {{ $page_action ?? '' }}</title>
    <!-- Fav Icon -->
<link rel="icon" href="{{asset('/assets/images/favicon.ico')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @yield('style')
    <!-- Stylesheets -->
<link href="{{asset('/assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/jquery-ui.css')}}" rel="stylesheet">
{{-- <link href="{{asset('/assets/css/nice-select.css')}}" rel="stylesheet"> --}}
<link href="{{asset('/assets/css/color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
<link href="{{asset('/assets/css/switcher-style.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet">
    

</head>
<body>
        <div class="boxed_wrapper">
            <!-- Header START -->
            @include('frontend.layouts.parts.header')
            <!-- Header END -->

            @yield('breadcrumb')
                    
            @yield('content')
            <!-- Content  -->
            
            <!-- Footer START -->
            @include('frontend.layouts.parts.footer')
            <!-- Footer END -->
            
        </div>

    <!-- jequery plugins -->
    <script src="{{asset('/assets/js/jquery.js')}}"></script>
    <script src="{{asset('/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/owl.js')}}"></script>
    <script src="{{asset('/assets/js/wow.js')}}"></script>
    <script src="{{asset('/assets/js/validation.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('/assets/js/appear.js')}}"></script>
    <script src="{{asset('/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('/assets/js/isotope.js')}}"></script>
    {{-- <script src="{{asset('/assets/js/jquery.nice-select.min.js')}}"></script> --}}
    <script src="{{asset('/assets/js/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('/assets/js/nav-tool.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('/assets/js/script.js')}}"></script>
    <!-- page js -->
    @yield('script')

</body>
</html>
