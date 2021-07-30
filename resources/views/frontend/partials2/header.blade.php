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

<!--== Start Header Wrapper ==-->
<header class="header-area header-default sticky-header">
    <div class="container">
        <div class="row align-items-center justify-content-between position-relative">
            <div class="col">
                <div class="header-logo-area">
                    <a href="index.html">
                        <img class="logo-main" src="{{ asset("frontend-access") }}/assets/img/logo.png" alt="Logo" />
                        <img class="logo d-none" src="{{ asset("frontend-access") }}/assets/img/logo-light.png" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="header-navigation-area">
                    <ul class="main-menu nav">
                        <li class="has-submenu"><a href="{{ route("homepage") }}"><span>Home</span></a>

                        </li>
                        <li class="has-submenu full-width"><a href="{{ route("shop.products") }}"><span>Shop</span></a>

                        </li>
                        <li class="has-submenu"><a href="{{ route("shop.products") }}"><span>Products</span></a>
                            <ul class="submenu-nav">
                                @foreach($productHeader as $product)
                                    <li><a href="{{ route("product.detail" , ['id' => $product->id]) }}">{{ $product->product_name }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="has-submenu"><a href="#/"><span>Pages</span></a>

                        </li>
                        <li class="has-submenu"><a href="#/"><span>Blog</span></a>
                            <ul class="submenu-nav">
                                <li><a href="blog.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-grid.html">Blog Grid Layout</a></li>
                                <li><a href="single-blog.html">Single Blog Left Sidebar</a></li>
                                <li><a href="single-blog-right-sidebar.html">Single Blog Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html"><span>Contact</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="header-action-area">
                    <ul class="header-action">
                        <li class="currency-menu">
                            <a class="title" href="javascript:;">USD</a>
                            <ul class="currency-dropdown">
                                <li class="currency">
                                    <ul>
                                        <li class="active"><a href="#/">USD - US Dollar</a></li>
                                        <li class="#/"><a href="#/">EUR - Euro</a></li>
                                        <li class="#/"><a href="#/">GBP - British Pound</a></li>
                                        <li class="#/"><a href="#/">INR - Indian Rupee</a></li>
                                        <li class="#/"><a href="#/">USD - Bangladesh Taka</a></li>
                                        <li class="#/"><a href="#/">JPY - Japan Yen</a></li>
                                        <li class="#/"><a href="#/">CAD - Canada Dollar</a></li>
                                        <li class="#/"><a href="#/">AUD - Australian Dollar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="header-action">
                        <li class="user-menu">
                            <a class="title" href="javascript:;"><i class="fa fa-user-o"></i></a>
                            <ul class="user-dropdown">
                                <li class="user">
                                    <ul>
                                        <li><a href="#/">Login</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="header-action">
                        <div class="header-search">
                            <button class="search-toggle">
                                <i class="search-icon bardy bardy-search"></i>
                                <i class="close-icon bardy bardy-cancel"></i>
                            </button>
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="search" placeholder="Search our store">
                                    <button type="submit"><i class="bardy bardy-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-action">
                        <div class="header-mini-cart">
                            <button class="mini-cart-toggle">
                                <i class="icon bardy bardy-shopping-cart"></i>
                                <span class="number"></span>
                            </button>
                            <div class="mini-cart-dropdown">
                                <h4 class="cart-title">Your cart</h4>
                                <div class="cart-item-wrap">
                                    @if(session('cart'))
                                        @php
                                            $carts = session('cart');

                                        @endphp
                                        @foreach($carts as $cart)

                                            <div class="cart-item">
                                                <div class="thumb">
                                                    <a href=""><img class="w-100" src="{{ asset("{$cart['image']}") }}" alt=""></a>
                                                    <a class="remove" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a href="#/">{{ $cart['name'] }}</a></h5>
                                                    <span> {{ $cart['product_quantity'] }}  x {{ $cart['price'] }}   </span>
                                                </div>
                                            </div>
                                        @endforeach

                                    @else
                                        <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                                    @endif

                                </div>
                                <div class="mini-cart-footer">
                                    <h4>Subtotal: <span class="total">Tk 130.00</span></h4>
                                    <div class="cart-btn">
                                        <a href="{{ route("cart.show") }}">View Cart</a>
                                        <a href="{{ route("payment.index") }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-action d-block d-lg-none text-end">
                        <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== End Header Wrapper ==-->
