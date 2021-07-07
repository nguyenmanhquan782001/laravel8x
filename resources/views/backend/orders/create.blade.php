@extends("backend.layouts.main")
@section("title" , "Tạo đơn hàng")
@section("main_content")
    <div class="main_content_iner ">
        @if(session('success'))
        @endif
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{{ route("order.store") }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Tên khách hàng</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <input value="{{ old("customer_name" , "") }}" type="text" class="form-control" name="customer_name" id="inputText"
                                           placeholder="Tên khách hàng....">
                                </div>
                                <br>
                                @if($errors->has('customer_name'))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first('customer_name') }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Email khách hàng</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <input value="{{ old("customer_email" , " ") }}" type="text" class="form-control" name="customer_email"
                                           id="inputText" placeholder="Email khách hàng....">
                                </div>
                                <br>
                                @if($errors->has('customer_email'))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first('customer_email') }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Số điện thoại</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <input value="{{ old("customer_phone" , "") }}" type="text" class="form-control" name="customer_phone"
                                           id="inputText" placeholder="Số điện thoại khách hàng.....">
                                </div>
                                <br>
                                @if($errors->has('customer_phone'))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first('customer_phone') }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Trạng thái đơn hàng</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <select name="order_status" id="status_order" class="form-control">
                                        <option value="1" {{ old('order_status', "") == 1 ? "selected" : "" }}>Đang chờ xác nhận</option>

                                        <option value="2" {{ old('order_status', "") == 2 ? "selected" : "" }}>Đã xác nhận</option>

                                        <option value="3" {{ old('order_status', "") == 3 ? "selected" : "" }}>Đang vận chuyển</option>

                                        <option value="4" {{ old('order_status', "") == 4 ? "selected" : "" }}>Hoàn tất</option>

                                        <option value="5" {{ old('order_status', "") == 5 ? "selected" : "" }}>Đơn hủy</option>

                                        <option value="6" {{ old('order_status', "") == 6 ? "selected" : "" }}>Đã hoàn tiền ( hủy đơn )</option>

                                    </select>

                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Địa chỉ giao hàng</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <input value="{{ old("customer_address" , "") }}" type="text" name="customer_address" class="form-control" placeholder="Địa chỉ giao hàng">
                                </div>
                                <br>
                                @if($errors->has('customer_address'))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first('customer_address') }}</code></h6>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Tìm kiếm sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <select name="search_product" id="search_product" class="form-control">
                                        <option value="">Search...</option>
                                    </select>
                                    <br> <br>
                                    <a id="add_to_cart" class="btn mb-3 btn-info"><i class="ti-heart f_s_14 mr-2"></i>Add
                                        Product
                                    </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Sản phẩm trong đơn hàng</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <table class="table table-active">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody id="list_cart_product">

                                        </tbody>
                                    </table>
                                    <div>
                                        <h6>Tổng tiền thanh toán : <i id="payment_price">

                                            </i></h6>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Ghi chú</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <textarea name="order_note" id="" cols="30" rows="3" class="form-control">
                                        {{ old("order_note" , "") }}
                                    </textarea>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route("order.index") }}">
                    <button type="button" class="btn mb-3 btn-danger"><i class="ti-heart f_s_14 mr-2"></i>Quay lại
                    </button>
                </a>
                <button type="submit" class="btn mb-3 btn-success"><i class="ti-heart f_s_14 mr-2"></i>Submit</button>
            </form>

        </div>
    </div>


@endsection
@section("append_js")
    <script>
        $(document).ready(function () {
            function updateCart() {
                var total = 0;
                $("input[name='product_quantity[]']").each(function (index, value) {
                    var that = $(this);
                    var tr = that.closest("tr");
                    //  chọn thành phần đầu tiên tính từ thành phần cha trở nên của chính thành phần được chọn .
                    var quantity = that.val();
                    // lấy giá trị của input quantity
                    var price = tr.find("td.product_price").text();
                    price = parseInt(price);
                    var total_price = quantity * price;
                    tr.find("td.total_price_product").text(total_price);
                    total += total_price;
                });
                $("#payment_price").text(total);
            }

            $("#search_product").select2({
                placeholder: "Tìm kiếm 1 sản phẩm",
                ajax: {
                    type: "POST",
                    data: function (params) {
                        query = {
                            search: params.term,
                            _token: "{{ csrf_token() }}"
                        }
                        return query;
                    },
                    url: "{{ url("/admin/orders/searchProduct") }}",
                    processResults: function (data) {
                        // console.log("data", data)
                        return data;
                    }
                }
            });
            $("#add_to_cart").on("click", function (e) {
                e.preventDefault();
                let id = $("#search_product").val();
                id = parseInt(id);
                if (id > 0) {
                    $.ajax({
                        method: "POST",
                        url: "{{ url()->route("ajaxAdd") }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        }
                    }).done(function (product) {

                        checkTr = $("tbody#list_cart_product").find("#tr-"+product.id).length;
                        checkTr = parseInt(checkTr);
                        console.log(checkTr) ;

                        if (product.id !== "undefined" && product.product_quantity > 0 && checkTr < 1 ) {
                            let html = '<tr id= "tr-'+product.id+'"> \n'
                                +
                                '<td>\n' + '\n' + product.id
                                +
                                '<input type="hidden" name="product_ids[]" class="form-control" value="' + product.id + '">\n'
                                +
                                '</td>\n'
                                +
                                '<td> ' + product.product_name + ' </td>'
                                +
                                '<td> <img src=" ' + product.product_image + ' " alt="" width="100px"> </td>'
                                +
                                '<td>\n'
                                +
                                '<input type="number" id="quantity" name="product_quantity[]" class="form-control" style="width: 150px" value="1" min="0" >\n'
                                +
                                '</td>\n'
                                +
                                '<td class="product_price">'
                                +
                                product.product_price
                                +
                                '</td>\n'
                                +
                                '<td class="total_price_product">'
                                +
                                product.product_price
                                +
                                '</td>\n'
                                +
                                '<td>\n'
                                +
                                '<a href="#" class="btn btn-danger remove"> Xóa </a>'
                                +
                                '</tr>'
                            ;
                            $("tbody#list_cart_product").append(html);
                            updateCart();
                        } else {
                            alert("thêm sản phẩm không thành công do đã có sp trong giỏ hàng hoặc lỗi hệ thống");
                        }
                    });
                } else {
                    alert("Chọn sản phẩm đã");
                }
            });
            $("body").on("click", 'a.remove' ,  function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                updateCart();

            });
            $("body").on("change", ["input[name='product_quantity[]']"], function () {
                 let that = $(this);
                 let quantity = that.val();
                 quantity = parseInt(quantity)

                if (quantity >= 1 && quantity < 100) {
                    console.log("Done");
                    updateCart();

                }else {
                    that.val(1);
                    console.log("Hello");
                    // updateCart();
                }
            });

        });
    </script>

@endsection
