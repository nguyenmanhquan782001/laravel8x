@extends("backend.layouts.main")
@section("title" ,"Sửa đơn hàng")
@section("main_content")
    <div class="main_content_iner ">
        @if(session('success'))
        @endif
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{" method="post">
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
                                    <input value="{{ $order->customer_name  }}" type="text" class="form-control"
                                           name="customer_name" id="inputText"
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
                                    <input value="{{ old("customer_email" , "") }}" type="text" class="form-control"
                                           name="customer_email"
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
                                    <input value="{{ old("customer_phone" , "") }}" type="text" class="form-control"
                                           name="customer_phone"
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
                                        <option value="1" {{ old('order_status', "") == 1 ? "selected" : "" }}>Đang chờ
                                            xác nhận
                                        </option>

                                        <option value="2" {{ old('order_status', "") == 2 ? "selected" : "" }}>Đã xác
                                            nhận
                                        </option>

                                        <option value="3" {{ old('order_status', "") == 3 ? "selected" : "" }}>Đang vận
                                            chuyển
                                        </option>

                                        <option value="4" {{ old('order_status', "") == 4 ? "selected" : "" }}>Hoàn
                                            tất
                                        </option>

                                        <option value="5" {{ old('order_status', "") == 5 ? "selected" : "" }}>Đơn hủy
                                        </option>

                                        <option value="6" {{ old('order_status', "") == 6 ? "selected" : "" }}>Đã hoàn
                                            tiền ( hủy đơn )
                                        </option>

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
                                    <input value="{{ old("customer_address" , "") }}" type="text"
                                           name="customer_address" class="form-control" placeholder="Địa chỉ giao hàng">
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

                <a href="">
                    <button type="button" class="btn mb-3 btn-danger"><i class="ti-heart f_s_14 mr-2"></i>Quay lại
                    </button>
                </a>
                <button type="submit" class="btn mb-3 btn-success"><i class="ti-heart f_s_14 mr-2"></i>Submit</button>
            </form>

        </div>
    </div>

@endsection
