<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:47:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Diana – Furniture Store eCommerce Bootstrap5 Template</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset("frontend-access/") }}assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/bootstrap.min.css") }}" rel="stylesheet" />
    <!--== Headroom CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/headroom.css") }}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/animate.css") }}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/font-awesome.min.css") }}" rel="stylesheet" />
    <!--== Bardy Icon CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/bardy.icon.css") }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/swiper.min.css") }}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/fancybox.min.css") }}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/slicknav.css") }}" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/aos.min.css") }}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/style.css") }}" rel="stylesheet" />


</head>

<body>

<!--wrapper start-->
<div class="wrapper">

    @include("frontend.partials.header")


   @yield("main_content")


    @include('frontend.partials.footer')


</div>
@include("frontend.partials.main_js")


</body>


<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:47:05 GMT -->
</html>
