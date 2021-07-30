@if( session('cart'))
    <div class="row">
        @if(session('success'))

            @endif
        <div class="col-12">
            <div class="shopping-cart-wrap" data-url="{{ route("cart.delete") }}">
                <div class="cart-table table-responsive">
                    <table class="table data_url " data-url= {{ route("cart.update") }}>
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($carts as $id => $cart)
                            @php
                                @$total += @$cart['price'] * $cart['product_quantity'];
                            @endphp
                            <tr>
                                <td class="pro-thumbnail">
                                    <a href=""><img
                                            src="{{ asset("{$cart['image']}") }}"
                                            alt="Image-HasTech"></a>
                                </td>
                                <td class="pro-title">
                                    <h4 class="title"><a href="shop.html">{{ $cart['name'] }}</a></h4>
                                    <span></span>
                                </td>
                                <td class="pro-price">
                                    <span class="amount">{{  number_format($cart['price']) }} $ </span>
                                </td>
                                <td class="pro-quantity">
                                    <div class="pro-qty">
                                        <input type="text"
                                               name="quantity_cart"
                                               id="quantity"
                                               title="Quantity"
                                               data-id="{{ $id }}"

                                               value="{{ $cart['product_quantity'] }}">
                                    </div>
                                </td>

                                <td class="pro-subtotal">
                                    <span class="subtotal-amount">{{ number_format($cart['price'] * $cart['product_quantity'])  }} $ </span>
                                </td>
                                <td class="pro-remove">
                                    <a data-id="{{ $id }}" class="remove" href="">
                                        <i class="fa fa-trash-o"></i></a>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">

                    </div>
                    <div class="col-6 justify-content-center" style="margin-left: 40px" >
                        <div class="cart-buttons">

                            <a class="theme-default-button" href="{{ route("shop.products") }}">Continue Shopping</a>
                            <a
                                data-url = "{{ route("cart.clear") }}"
                                class="theme-default-button clear"
                               href="">Clear Cart</a>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="cart-payment">
                            <div class="row">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-6">
                                    <div class="cart-total">
                                        <h4 class="title">Cart Summary</h4>
                                        <table>
                                            <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td><span class="amount"><span>{{ @$total }} $</span></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Grand Total</th>
                                                <td>
                                                    <span class="amount"><span>{{ @$total }} $</span></span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="proceed-to-checkout">
                                            <a class="shop-checkout-button" href="{{ route("payment.index") }}">Proceed to
                                                Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <h5 style="text-align: center">Không có sản phẩm nào trong giỏ hàng</h5>
@endif
@section("append_js")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cartUpdate(e) {
            e.preventDefault();
            let data_url = $(".data_url").data("url");
            console.log(data_url);
            // let id = $(this).data("id");
            // id = parseInt(id);
            var input = $(this).closest(".pro-qty").find("input").eq(0);
            var id = input.data("id");

            let qtt = $(this).parents('tr').find('#quantity').val();
            qtt = parseInt(qtt);
            $.ajax({
                type: "GET",
                url: data_url,
                data: {id: id, quantity: qtt},
                success: function (data) {
                    if (data.code == 200) {
                        $(".cart-table").html(data.cart)
                    }
                },
                error: function () {

                }
            }).done(function (data){
                location.reload();
            });
        }
        function  cartDelete(e) {
            e.preventDefault();
            let urlDelete = $(".shopping-cart-wrap").data('url');
            let id = $(this).data("id");
            id = parseInt(id);
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {id: id},
                success: function (data) {
                    if (data.code == 200) {
                        $(".cart-table").html(data.cart)
                    }
                },
                error: function () {

                }
            }).done(function (){
                location.reload()
            });
        }
        function clearCart (e) {
            e.preventDefault();
            let urlClear = $(this).data('url') ;
            $.ajax({
                'type' : 'GET',
                url : urlClear,
                success : function (data) {
                    let timerInterval
                    Swal.fire({
                        title: 'Đang dọn dẹp giỏ hàng đợi trong giây lát ',
                        html: 'I will close in <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                }
            }).done(function (){
                location.reload();
            })

        }
        $(function () {
            $(document).on("click", '.qty-btn', cartUpdate)
            $(document).on("click", ".remove" , cartDelete)
            $(document).on("click", ".clear" , clearCart)
        })
    </script>
@endsection
