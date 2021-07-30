<div class="col-lg-3">
    <!--== Start Product Sidebar Wrapper ==-->
    <div class="product-sidebar-wrapper">
        <!--== Start Product Sidebar Item ==-->
        <div class="product-sidebar-item">
            <h4 class="product-sidebar-title">Search</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-search-form">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control" type="search" placeholder="Enter key words">
                            <button type="submit" class="btn-src">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--== End Product Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item">
            <h4 class="product-sidebar-title">Categories</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-nav-menu">
                    @foreach($categories as $category)
                    <a href="{{ route("product.category" , ['id' => $category->id]) }}">{{ $category->category_name }} <span>( {{ count($category->countProduct) }} )</span></a>
                    @endforeach
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item">
            <h4 class="product-sidebar-title">Vendors</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-nav-menu">
                    <a href="#/">Vendor <span>1</span></a>
                    <a href="#/">Vendor <span>10</span></a>
                    <a href="#/">Vendor <span>11</span></a>
                    <a href="#/">Vendor <span>2</span></a>
                    <a href="#/">Vendor <span>3</span></a>
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item">
            <h4 class="product-sidebar-title">Products Types</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-nav-menu">
                    <a href="#/">Type <span>1</span></a>
                    <a href="#/">Type <span>10</span></a>
                    <a href="#/">Type <span>11</span></a>
                    <a href="#/">Type <span>2</span></a>
                    <a href="#/">Type <span>3</span></a>
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item mb-5 pb-2">
            <h4 class="product-sidebar-title">Color</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-color-menu">
                    <div class="red"></div>
                    <div class="green"></div>
                    <div class="blue"></div>
                    <div class="yellow"></div>
                    <div class="white"></div>
                    <div class="gold"></div>
                    <div class="gray"></div>
                    <div class="magenta"></div>
                    <div class="maroon"></div>
                    <div class="navy"></div>
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item mb-5 pb-2">
            <h4 class="product-sidebar-title">Size</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-size-menu">
                    <ul>
                        <li><a href="#/">s</a></li>
                        <li><a href="#/">m</a></li>
                        <li><a href="#/">l</a></li>
                        <li><a href="#/">xl</a></li>
                        <li><a href="#/">xxl</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item mb-5 pb-2">
            <h4 class="product-sidebar-title">Slug</h4>
            <div class="product-sidebar-body">
                <div class="product-sidebar-tag-menu">
                    <ul>
                        @foreach($categories as $slug)
                        <li><a href="{{ $slug->id }}">{{ $slug->slug }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--== End Sidebar Item ==-->

        <!--== Start Sidebar Item ==-->
        <div class="product-sidebar-item">
            <h4 class="product-sidebar-title">Banner</h4>
            <div class="product-sidebar-body">
                <!--== Start Product Item ==-->
                <div class="product-sidebar-item">
                    <div class="thumb">
                        <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset("frontend-access") }}/assets/img/slider/slider-05.jpg" alt="Image-HasTech">
                        </a>
                    </div>
                </div>
                <!--== End Product Item ==-->
            </div>
        </div>
        <!--== End Sidebar Item ==-->
    </div>
    <!--== End Product Sidebar Wrapper ==-->
</div>
