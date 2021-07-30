@extends("frontend.layouts.main2")
@section("title" , "$category->category_name")
@section("page_name" , "$category->category_name")
@section("page_name2" , "$category->category_name")
@section("main_products")
    @if(count($category->countProduct) == 0)
        <div class="col-lg-9">
            <i>Không có sản phẩm nào trong mục này</i>
        </div>

    @else
    <div class="col-lg-9">
        <div class="product-header-wrap">
            <div class="grid-list-option">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid"
                                aria-selected="true"><span data-bg-img="assets/img/icons/1.webp"></span></button>
                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list"
                                type="button" role="tab" aria-controls="nav-list" aria-selected="false"><span
                                data-bg-img="assets/img/icons/1.webp"></span></button>
                    </div>
                </nav>
            </div>

            <div class="nav-short-area">
                <div class="toolbar-shorter">
                    <label for="SortBy">Sort by</label>
                    <select id="SortBy" class="form-select" aria-label="Sort by">
                        <option value="manual">Featured</option>
                        <option value="best-selling">Best Selling</option>
                        <option value="title-ascending" selected>Alphabetically, A-Z</option>
                        <option value="title-descending">Alphabetically, Z-A</option>
                        <option value="price-ascending">Price, low to high</option>
                        <option value="price-descending">Price, high to low</option>
                        <option value="created-descending">Date, new to old</option>
                        <option value="created-ascending">Date, old to new</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="product-body-wrap">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
@foreach($category->countProduct as $product)
                            <div class="col-sm-6 col-xl-4">
                                <!--== Start Shop Item ==-->
                                <div class="product-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            <a href="{{ route("product.detail" , ['id' => $product->id]) }}">
                                                <img class="w-100"
                                                     src="{{ asset("$product->product_image") }}"
                                                     alt="Image-HasTech">
                                            </a>
                                            <div class="product-action">
                                                <div class="addto-wrap">
                                                    <a class="add-cart" href="shop-cart.html">
                                  <span class="icon">
                                    <i class="bardy bardy-shopping-cart"></i>
                                    <i class="hover-icon bardy bardy-shopping-cart"></i>
                                  </span>
                                                    </a>
                                                    <a class="add-wishlist" href="wishlist.html">
                                  <span class="icon">
                                    <i class="bardy bardy-wishlist"></i>
                                    <i class="hover-icon bardy bardy-wishlist"></i>
                                  </span>
                                                    </a>
                                                    <a class="add-quick-view" href="javascript:void(0);">
                                  <span class="icon">
                                    <i class="bardy bardy-quick-view"></i>
                                    <i class="hover-icon bardy bardy-quick-view"></i>
                                  </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-info">
                                                <h4 class="title"><a
                                                        href="shop-single.html">{{ $product->product_name }}</a></h4>
                                                <div class="star-content">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="prices">

                                                    <span class="price-old">{{ $product->product_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Shop Item ==-->
                            </div>

                        @endforeach

                    </div>
                    <!--== Start Pagination Wrap ==-->
                    <div class="row">
                        <div class="col-12">
                            <div class="pagination-content-wrap">
                                <nav class="nav-link">
{{--                                    {{ $products->links("vendor.pagination.custom") }}--}}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--== End Pagination Wrap ==-->
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
