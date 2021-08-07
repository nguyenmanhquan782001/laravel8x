@extends("frontend.layouts.main3")
@section("title" , "Sản phẩm")
@section("page_name" , "$product->product_name")
@section("page_name2" , "$product->product_name")
@section("main_products")
    <div class="col-lg-9">
        <div class="product-single-item">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-slider">
                        <!--== Start Product Thumbnail Area ==-->
                        <div class="product-thumb">
                            <div class="swiper-container single-product-thumb-slider">
                                <div class="swiper-wrapper">
                                    @foreach($gallery as $gal)
                                        <div class="swiper-slide">
                                            <div class="zoom zoom-hover">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="{{ asset("$gal->image_path") }}">
                                                    <img src="{{ asset("$gal->image_path") }}" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--== End Product Thumbnail Area ==-->

                        <!--== Start Product Nav Area ==-->
                        <div class="swiper-container single-product-nav-slider product-nav">
                            <div class="swiper-wrapper">
                                @foreach($gallery as $gal)
                                    <div class="swiper-slide">
                                        <img src="{{ asset("$gal->image_path") }}" alt="Image-HasTech">
                                    </div>
                                @endforeach
                            </div>

                            <!--== Add Swiper navigation Buttons ==-->
                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <!--== End Product Nav Area ==-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--== Start Product Info Area ==-->
                    <div class="product-single-info product-single-soldout">
                        <h4 class="title">{{ $product->product_name }}</h4>
                        <div class="prices">
                            <span class="price">TK {{ $product->product_price }}</span>

                        </div>
                        <div class="star-content">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>{{ $product->short_desc }}</p>
                        <div class="product-action-simple">
                            <div class="cart-wishlist-button">
                                <a href="#/" class="btn-soldout">Soldout</a>
                                <div class="product-wishlist">
                                    <a class="add-wishlist" href="wishlist.html">
                            <span class="icon">
                              <i class="bardy bardy-wishlist"></i>
                              <i class="hover-icon bardy bardy-wishlist"></i>
                            </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-action-bottom">
                            <div class="social-sharing">
                                <span>Share:</span>
                                <div class="social-icons">
                                    <a href="#/"><i class="shopify-social-icon-facebook-rounded color"></i></a>
                                    <a href="#/"><i class="shopify-social-icon-twitter-rounded color"></i></a>
                                    <a href="#/"><i class="shopify-social-icon-googleplus-rounded color"></i></a>
                                    <a href="#/"><i class="shopify-social-icon-pinterest-rounded color"></i></a>
                                </div>
                            </div>
                            <div class="text-info">
                                <p>Guaranteed safe checkout</p>
                            </div>
                        </div>
                    </div>
                    <!--== End Product Info Area ==-->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="product-review-tabs-content">
                        <div class="nav nav-tabs product-tab-nav" id="ReviewTab" role="tablist">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" aria-controls="description"
                                    aria-selected="true">Description
                            </button>
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" aria-controls="reviews" aria-selected="false">Reviews
                            </button>
                            <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments"
                                    type="button" aria-controls="comments" aria-selected="false">Comments
                            </button>
                            <button class="nav-link" id="shipping-policy-tab" data-bs-toggle="tab"
                                    data-bs-target="#shipping-policy" type="button" aria-controls="shipping-policy"
                                    aria-selected="false">Shipping Policy
                            </button>
                            <button class="nav-link" id="size-chart-tab" data-bs-toggle="tab"
                                    data-bs-target="#size-chart" type="button" aria-controls="size-chart"
                                    aria-selected="false">Size Chart
                            </button>
                        </div>
                        <div class="tab-content product-tab-content" id="ReviewTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                 aria-labelledby="description-tab">
                                <div class="product-description">
                                    <p>{!!  $product->product_desc !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-review-content">
                                    <div class="review-content-header">
                                        <h3>Customer Reviews</h3>
                                        <div class="review-info">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <span class="review-caption">Based on 7 reviews</span>
                                            <span class="review-write-btn">Write a review</span>
                                        </div>
                                    </div>

                                    <!--== Start Reviews Form Item ==-->
                                    <div class="reviews-form-area">
                                        <h4 class="title">Write a review</h4>
                                        <div class="reviews-form-content">
                                            <form action="" method="">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_name">Name</label>
                                                            <input id="for_name" class="form-control" type="text"
                                                                   placeholder="Enter your name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_email">Email</label>
                                                            <input id="for_email" class="form-control" type="email"
                                                                   placeholder="john.smith@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <span class="title">Rating</span>
                                                            <ul class="review-rating">
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_review-title">Review Title</label>
                                                            <input id="for_review-title" class="form-control"
                                                                   type="text" placeholder="Give your review a title">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_comment">Body of Review (1500)</label>
                                                            <textarea id="for_comment" class="form-control"
                                                                      placeholder="Write your comments here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-submit-btn">
                                                            <button type="submit" class="btn-submit">Post comment
                                                            </button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--== End Reviews Form Item ==-->

                                    <div class="reviews-content-body">
                                        <!--== Start Reviews Content Item ==-->
                                        <div class="review-item">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                            </ul>
                                            <h3 class="title">Awesome shipping service!</h3>
                                            <h5 class="sub-title"><span>Nantu Nayal</span> no <span>Sep 30, 2018</span>
                                            </h5>
                                            <p>It has survived not only five centuries, but also the leap into
                                                electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            <a href="#/">Report as Inappropriate</a>
                                        </div>

                                        <div class="review-item">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <h3 class="title">Low Quality</h3>
                                            <h5 class="sub-title"><span>Oliv hala</span> no <span>Sep 30, 2018</span>
                                            </h5>
                                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                                below for those interested. Sections 1.10.32 and 1.10.33 from "de
                                                Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
                                                original form, accompanied by English versions from the 1914 translation
                                                by H. Rackham.</p>
                                            <a href="#/">Report as Inappropriate</a>
                                        </div>

                                        <div class="review-item">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                            </ul>
                                            <h3 class="title">Excellent services!</h3>
                                            <h5 class="sub-title"><span>Halk Marron</span> no <span>Sep 30, 2018</span>
                                            </h5>
                                            <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from
                                                a line in section 1.10.32.</p>
                                            <a href="#/">Report as Inappropriate</a>
                                        </div>

                                        <div class="review-item">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <h3 class="title">Price is very high</h3>
                                            <h5 class="sub-title"><span>Musa</span> no <span>Sep 30, 2018</span></h5>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                                roots in a piece of classical Latin literature from 45 BC, making it
                                                over 2000 years old.</p>
                                            <a href="#/">Report as Inappropriate</a>
                                        </div>
                                        <!--== End Reviews Content Item ==-->

                                        <!--== Start Reviews Content Item ==-->
                                        <div class="review-item">
                                            <ul class="review-rating">
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star"></li>
                                                <li class="fa fa-star-o"></li>
                                            </ul>
                                            <h3 class="title">Normal</h3>
                                            <h5 class="sub-title"><span>Muhammad</span> no <span>Sep 30, 2018</span>
                                            </h5>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour</p>
                                            <a href="#/">Report as Inappropriate</a>
                                        </div>
                                        <!--== End Reviews Content Item ==-->
                                    </div>

                                    <!--== Start Reviews Pagination Item ==-->
                                    <div class="review-pagination">
                                        <span class="pagination-pag">1</span>
                                        <span class="pagination-pag">2</span>
                                        <span class="pagination-next">Next »</span>
                                    </div>
                                    <!--== End Reviews Pagination Item ==-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                @php
                                    if (session('user-login')) {
        $user = session("user-login" , false);
  }
                                @endphp
                                <div class="product-comment-content">
                                    <form action="{{ route("cmt") }}" method="post">
                                        @csrf
                                        <div class="product-comment">
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                @php
                                                    $getImg =Auth::user();
                                                @endphp
                                                <img src="{{ asset(Auth::user()->avatar) }}" alt="Image-HasTech">
                                            @else
                                                <img
                                                    src="https://anhdep123.com/wp-content/uploads/2021/05/hinh-avatar-trang.jpg"
                                                    alt="Image-HasTech">
                                            @endif
                                            <textarea name="content" placeholder="Start the discussion…"></textarea>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </div>
                                        <button class="btn-theme" type="submit">Post as Product</button>
                                    </form>

                                </div>
                                <br>
                                @foreach($product->comments as $comment)
                                    <div style="border-bottom: 1px solid black ; margin-bottom: 20px ;">
                                        <b style="margin-bottom: 20px">{{ $comment->userId->name }}</b>
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-1 justify-content-sm-center" >
                                                @if(Auth::user()->id == $comment->user_id && Auth::user() != null )
                                                <img style="width: 25px; height: 25px ; border-radius: 50% ; margin-bottom: 10px"
                                                    src="{{ asset(Auth::user()->avatar) }}" alt="">
                                                @else
                                                    <img style="width: 25px; height: 25px ; border-radius: 50% ; margin-bottom: 10px"
                                                        src="https://anhdep123.com/wp-content/uploads/2021/05/hinh-avatar-trang.jpg"
                                                        alt="Image-HasTech">
                                                @endif
                                            </div>
                                            <div class="col-10">
                                                <p style="margin-left: 30px">{{  $comment->content }}</p>
                                            </div>
                                            <div class="col-1">
                                                @if(\Illuminate\Support\Facades\Auth::user()->id == $comment->user_id)
                                                <a href="{{ route("deleteCmt" , ['id' => $comment->id]) }}">Xóa</a>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="shipping-policy" role="tabpanel"
                                 aria-labelledby="shipping-policy-tab">
                                <div class="product-shipping-policy">
                                    <div class="section-title">
                                        <h2 class="title">Shipping policy for our store</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut
                                            wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                            lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                                            dolor in hendrerit in vulputate</p>
                                    </div>
                                    <ul class="shipping-policy-list">
                                        <li>1-2 business days (Typically by end of day)</li>
                                        <li><a href="#/">30 days money back guaranty</a></li>
                                        <li>24/7 live support</li>
                                        <li>odio dignissim qui blandit praesent</li>
                                        <li>luptatum zzril delenit augue duis dolore</li>
                                        <li>te feugait nulla facilisi.</li>
                                    </ul>
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming
                                        id quod mazim placerat facer possim assum. Typi non habent claritatem insitam;
                                        est usus legentis in iis qui facit eorum</p>
                                    <p>claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                                        legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem
                                        consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus
                                        parum claram, anteposuerit litterarum formas humanitatis per</p>
                                    <p>seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur
                                        parum clari, fiant sollemnes in futurum.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="size-chart" role="tabpanel" aria-labelledby="size-chart-tab">
                                <div class="product-size-chart">
                                    <h4>Size Chart</h4>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cun-name"><span>UK</span></td>
                                            <td>18</td>
                                            <td>20</td>
                                            <td>22</td>
                                            <td>24</td>
                                            <td>26</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>European</span></td>
                                            <td>46</td>
                                            <td>48</td>
                                            <td>50</td>
                                            <td>52</td>
                                            <td>54</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>usa</span></td>
                                            <td>14</td>
                                            <td>16</td>
                                            <td>18</td>
                                            <td>20</td>
                                            <td>22</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>Australia</span></td>
                                            <td>28</td>
                                            <td>10</td>
                                            <td>12</td>
                                            <td>14</td>
                                            <td>16</td>
                                        </tr>
                                        <tr>
                                            <td class="cun-name"><span>Canada</span></td>
                                            <td>24</td>
                                            <td>18</td>
                                            <td>14</td>
                                            <td>42</td>
                                            <td>36</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
