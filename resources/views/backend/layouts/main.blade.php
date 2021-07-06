<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/analytic-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Jun 2021 13:01:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield("title" , 'Analytic')</title>

    <link rel="icon" href="{{ asset("backend-access/img/mini_logo.png") }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("/backend-access/css/bootstrap.min.css")}}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href=" {{ asset("/backend-access/vendors/themefy_icon/themify-icons.css") }}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/niceselect/css/nice-select.css") }}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/owl_carousel/css/owl.carousel.css") }}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/gijgo/gijgo.min.css") }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/font_awesome/css/all.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/tagsinput/tagsinput.css") }}" />

    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/datepicker/date-picker.css") }}" />

    <link rel="stylesheet" href="{{ asset('/backend-access/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/scroll/scrollable.css") }}" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{asset("/backend-access/vendors/datatable/css/jquery.dataTables.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/datatable/css/responsive.dataTables.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/datatable/css/buttons.dataTables.min.css") }}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/text_editor/summernote-bs4.css") }}" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/morris/morris.css") }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset("/backend-access/vendors/material_icon/material-icons.css") }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset("/backend-access/css/metisMenu.css") }}">
    <!-- style CSS -->
    <link rel="stylesheet" href=" {{ asset("/backend-access/css/style.css") }}" />
    <link rel="stylesheet" href="{{ asset("/backend-access/css/colors/default.css") }}" id="colorSkinCSS">
    <style>
        @yield('css')
    </style>
</head>
<body class="crm_body_bg">



<!-- main content part here -->

<!-- sidebar  -->
  @include('backend.partials.sidebar')
<!--/ sidebar  -->


<section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
    @include('backend.partials.header')
    <!--/ menu  -->

  @yield('main_content')
    <!-- footer part -->
   @include('backend.partials.footer')

</section>
<!-- main content part end -->

<!-- ### CHAT_MESSAGE_BOX   ### -->

@include('backend.partials.chat')

<!--/### CHAT_MESSAGE_BOX  ### -->

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>


<!-- footer  -->
@include('backend.partials.mainjs')
@include('sweetalert::alert')
@yield('append_js')
</body>

<!-- Mirrored from demo.dashboardpack.com/analytic-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Jun 2021 13:03:03 GMT -->
</html>
