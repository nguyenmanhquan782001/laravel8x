<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:47:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title> @yield("title" , "Trang chủ")</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset("frontend-access/assets/img/favicon.ico") }}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,400i,600,700" rel="stylesheet">

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

    @include("frontend.partials2.header")

    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="page-header-content">
                            <h4 class="title" data-aos="fade-down" data-aos-duration="1200">@yield("page_name" , 'Products')</h4>
                            <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1000">
                                <ul class="breadcrumb">
                                    <li><a href="{{ route("homepage") }}">Home</a></li>
                                    <li class="breadcrumb-sep"></li>
                                    <li>@yield("page_name2" , "Products")</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="product-area product-single-area">
            <div class="container">
                <div class="row flex-row-reverse">


                    @yield("main_products")




                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Feature Area Wrapper ==-->
    @include("frontend.partials2.method")
    <!--== End Feature Area Wrapper ==-->
    </main>

    @include("frontend.partials2.footer")
</div>

@include("frontend.partials2.main_js")
@yield("append_js")
@include('sweetalert::alert')


</body>


<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:47:47 GMT -->
</html>



