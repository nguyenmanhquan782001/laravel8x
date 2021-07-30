<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:48:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Products Information – Diana – Furniture Store eCommerce Bootstrap5 Template</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset("frontend-access/") }}assets/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/bootstrap.min.css") }}" rel="stylesheet"/>
    <!--== Headroom CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/headroom.css") }}" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/animate.css") }}" rel="stylesheet"/>
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/font-awesome.min.css") }}" rel="stylesheet"/>
    <!--== Bardy Icon CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/bardy.icon.css") }}" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/swiper.min.css") }}" rel="stylesheet"/>
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/fancybox.min.css") }}" rel="stylesheet"/>
    <!--== Slicknav Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/slicknav.css") }}" rel="stylesheet"/>
    <!--== Aos Min CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/aos.min.css") }}" rel="stylesheet"/>

    <!--== Main Style CSS ==-->
    <link href="{{ asset("frontend-access/assets/css/style.css") }}" rel="stylesheet"/>


</head>

<body>

@if(session("cart"))
    <div class="wrapper product-information-wrapper">

        <!--== Start Preloader Content ==-->
        <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!--== End Preloader Content ==-->

        <main class="main-content">
            <!--== Start Product Area Wrapper ==-->
            <section class="product-area product-information-area">
                <div class="container">
                    <div class="product-information">
                        <div class="row">
                            <div class="col-lg-7">

                                <div class="edit-checkout-information">
                                    <div class="edit-checkout-head">
                                        <div class="header-logo-area">
                                            <a href="index.html">
                                                <img class="logo-main"
                                                     src="{{ asset('frontend-access')}}/assets/img/logo.png" alt="Logo">
                                            </a>
                                        </div>
                                        <div class="breadcrumb-area">
                                        </div>
                                    </div>
                                    <div class="logged-in-information">
                                        <div class="thumb"
                                             data-bg-img="{{ asset('frontend-access')}}/assets/img/photos/gravatar2.png"></div>
                                        <p>
                                            <span class="name">Diana</span>
                                            <span>(diana@example.com)</span>
                                            <a href="#">Log out</a>
                                        </p>
                                    </div>
                                    <div class="edit-checkout-form">
                                        <h5 class="title">Shipping address</h5>
                                        <form method="post" action="{{ route("checkout") }}" class="row row-gutter-12">
                                            @csrf
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text"
                                                           name="customer_name"
                                                           class="form-control"
                                                           id="floatingInputGrid"
                                                           placeholder="name" value="">
                                                    <label for="floatingInputGrid">Full name</label>
                                                    @if($errors->has("customer_name"))
                                                        <h6 style="margin-top: 5px; color: red"><i>{{ $errors->first("customer_name") }}</i></h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <input type="email"
                                                           name="customer_email"
                                                           class="form-control"
                                                           id="floatingInput2Grid"
                                                           placeholder="email" value="">
                                                    <label for="floatingInput2Grid">Email</label>
                                                    @if($errors->has("customer_email"))
                                                        <h6 style="margin-top: 5px; color: red"><i>{{ $errors->first("customer_email") }}</i></h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-floating">
                                                    <input type="text"
                                                           name="customer_address"
                                                           class="form-control"
                                                           id="floatingInput3Grid"
                                                           placeholder="address"
                                                           value="">
                                                    <label for="floatingInput3Grid">Address</label>
                                                    @if($errors->has("customer_address"))
                                                        <h6 style="margin-top: 5px; color: red"><i>{{ $errors->first("customer_address") }}</i></h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-floating">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="floatingInput3Grid"
                                                           name="customer_phone"
                                                           placeholder="Phone"
                                                           value="">
                                                    <label for="floatingInput3Grid">Phone</label>
                                                    @if($errors->has("customer_phone"))
                                                        <h6 style="margin-top: 5px; color: red"><i>{{ $errors->first("customer_phone") }}</i></h6>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-floating">
                                                    <textarea
                                                        class="form-control"
                                                        id="floatingInput3Grid"
                                                        name="order_note"
                                                        placeholder=""
                                                        value=""> </textarea>
                                                    <label for="floatingInput3Grid">Ghi chú</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="btn-box">
                                                    <a style="margin-right: 20px" class="btn btn-warning"
                                                       href="{{ route("shop.products") }}">Continue to shipping</a>
                                                    <a style="margin-right: 20px" class="btn btn-success"
                                                       href="{{ route("cart.show") }}">Return to cart</a>
                                                    <button type="submit" class="btn btn-danger">Muốn mất tiền thì
                                                        click
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="shipping-cart-subtotal-wrapper">
                                    <div class="shipping-cart-subtotal">

                                        @if(session("cart"))
                                            @php
                                                $carts = session('cart');
                                               $total_price = 0 ;
                                            @endphp
                                            @foreach(@$carts as $cart )
                                                @php
                                                    @$total_price += $cart['price'] * $cart['product_quantity'];
                                                @endphp
                                                <div class="shipping-cart-item">
                                                    <div class="thumb">
                                                        <img
                                                            src="{{ asset("{$cart['image']}") }}"
                                                            alt="">
                                                        <span class="quantity">{{ $cart['product_quantity'] }}</span>
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">{{ $cart['name'] }}</h4>
                                                        <span class="info"></span>
                                                        <span class="price">{{  number_format($cart['price'] * $cart['product_quantity']  ) }} $</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="shipping-subtotal">
                                            <p>
                                                <span>Subtotal</span><span><strong>{{ number_format($total_price) }} $</strong></span>
                                            </p>
                                            <p><span>Shipping</span><span>Calculated at next step</span></p>
                                        </div>
                                        <div class="shipping-total">
                                            <p class="total">Total</p>
                                            <p class="price"><span class="usd">$</span>{{ number_format($total_price) }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
            <!--== End Product Area Wrapper ==-->
        </main>

    </div>
@else
    <script>
        alert("Chưa có sản phẩm ko thể thanh toán vui lòng đặt hàng rồi quay lại đây")
        window.location.href = "{{ route("shop.products") }}"
    </script>
@endif


<script src="{{ asset('frontend-access')}}/assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/bootstrap.min.js"></script>
<!--=== jQuery Appear Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/jquery.appear.js"></script>
<!--=== jQuery Headroom Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/headroom.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/fancybox.min.js"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/slicknav.js"></script>
<!--=== jQuery Waypoint Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/waypoint.js"></script>
<!--=== jQuery Parallax Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/parallax.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/aos.min.js"></script>
<!--=== jQuery Countdown Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/countdown.js"></script>

<!--=== jQuery Custom Js ===-->
<script src="{{ asset('frontend-access')}}/assets/js/custom.js"></script>

</body>


<!-- Mirrored from htmldemo.hasthemes.com/diana/diana/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 15:48:03 GMT -->
</html>
