<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route("dashboard.index") }}"><img src="{{ asset("backend-access/img/logo.png") }}" alt=""></a>
        <a class="small_logo" href="{{ route("dashboard.index") }}"><img src="{{ asset("backend-access/img/mini_logo.png") }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li>
            <a href="{{ route("dashboard.index") }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/dashboard.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Analytic</span>
                </div>
            </a>
        </li>

        <h4 class="menu-text"><span>Category Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/16.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Category</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route("category.index") }}">Category Data</a></li>

            </ul>
        </li>

        <h4 class="menu-text"><span>Product Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/4.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Product</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route("product.index") }}">Product Data</a></li>

            </ul>
        </li>

        <h4 class="menu-text"><span>Order Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/img/menu-icon/8.svg") }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Đơn hàng</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route("order.index") }}">Order Data</a></li>
            </ul>
        </li>

        <h4 class="menu-text"><span>User Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/16.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Thành Viên</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route("user.index") }}">User Data</a></li>
            </ul>
        </li>

        <h4 class="menu-text"><span>Role Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/img/menu-icon/8.svg") }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Vai trò</span>
                </div>
            </a>
            <ul>
                <li><a href="{{ route("role.index") }}">Role Data</a></li>
            </ul>
        </li>


        <h4 class="menu-text"><span>Setting</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('/backend-access/img/menu-icon/8.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Animations</span>
                </div>
            </a>
            <ul>
                <li><a href="wow_animation.html">Animate</a></li>
                <li><a href="Scroll_Reveal.html">Scroll Reveal</a></li>
                <li><a href="tilt.html">Tilt Animation</a></li>

            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/9.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Components</span>
                </div>
            </a>
            <ul>
                <li><a href="accordion.html">Accordions</a></li>
                <li><a href="Scrollable.html">Scrollable</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="carousel.html">Carousel</a></li>
                <li><a href="Pagination.html">Pagination</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/11.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Table</span>
                </div>
            </a>
            <ul>
                <li><a href="data_table.html">Data Tables</a></li>
                <li><a href="bootstrap_table.html">Bootstrap</a></li>
            </ul>
        </li>



    </ul>
</nav>
