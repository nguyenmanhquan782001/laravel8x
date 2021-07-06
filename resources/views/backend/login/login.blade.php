<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>

    <!-- <link rel="icon" href="img/favicon.png" type="image/png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend-access/css/bootstrap.min.css') }}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('backend-access/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend-access/vendors/font_awesome/css/all.min.css') }}" />
    <!-- datatable CSS -->
    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset('backend-access/vendors/scroll/scrollable.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('backend-access/css/metisMenu.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('backend-access/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend-access/css/colors/default.css') }}" id="colorSkinCSS">
</head>
<body class="crm_body_bg">
@if(session('toast_error'))

@endif
<section class="main_content dashboard_part large_header_bg" style="margin-left: -125px">
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">

                            <div class="col-lg-6">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Log in</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('login.post') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input value="{{ old("email") }}" name ='email' type="email" class="form-control" placeholder="Enter your email">
                                            </div>
                                            @if($errors->has('email'))
                                            <h6><code>{{ $errors->first('email') }}</code></h6>
                                            @endif
                                            <div class="form-group">
                                                <input value="{{ old("password") }}" name="password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                            @if($errors->has('password'))
                                                <h6><code>{{ $errors->first('password') }}</code></h6>
                                            @endif
                                            <div>
                                                <input type="checkbox" name="remember_me" id="">
                                            </div>

                                         <button type="submit" style="background-color: #ff3333 ; border: none; font-weight: bold; "  class="btn_1 full_width text-center">
                                            LOGIN
                                         </button>
                                            <a style="background-color: #4873C8 ; font-weight: bold" href="#" class="btn_1 full_width text-center"><i style="background-color: white ; color:#1877F2 ;  ; font-size: 25px " class="fab fa-facebook-f"></i> LOGIN  WITH FACEBOOK</a>

                                            <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal"  href="#"> Sign Up</a></p>
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
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
    </div>
</section>
<!-- main content part end -->
<!-- ### CHAT_MESSAGE_BOX   ### -->



<!--/### CHAT_MESSAGE_BOX  ### -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
<!-- footer  -->

@include('sweetalert::alert')
<!-- jquery slim -->
<script src="{{ asset('backend-access/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('backend-access/js/popper.min.js') }}"></script>
<!-- bootstarp js -->
<script src="{{ asset('backend-access/js/bootstrap.min.js') }}"></script>
<!-- sidebar menu  -->
<script src="{{ asset('backend-access/js/metisMenu.js') }}"></script>

<!-- scrollabe  -->
<script src="{{ asset('backend-access/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('backend-access/vendors/scroll/scrollable-custom.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('backend-access/js/custom.js') }}"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/analytic-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Jun 2021 13:03:28 GMT -->
</html>
