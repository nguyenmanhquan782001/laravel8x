@extends("backend.layouts.main")
@section("title" ,"Sửa đơn hàng")
@section("main_content")
    <div class="main_content_iner ">
        @if(session('success'))
        @endif
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{{ route('order.update' , ['id' => $order->id]) }}" method="post">
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
                                    <input value="{{ $order->customer_email }}" type="text" class="form-control"
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
                                    <input value="{{ $order->customer_phone }}" type="text" class="form-control"
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
                                        <option value="1" {{ $order->order_status == 1 ? "selected" : "" }}>Đang chờ
                                            xác nhận
                                        </option>

                                        <option value="2" {{ $order->order_status == 2 ? "selected" : "" }}>Đã xác
                                            nhận
                                        </option>

                                        <option value="3" {{ $order->order_status == 3 ? "selected" : "" }}>Đang vận
                                            chuyển
                                        </option>

                                        <option value="4" {{ $order->order_status == 4 ? "selected" : "" }}>Hoàn
                                            tất
                                        </option>

                                        <option value="5" {{ $order->order_status == 5 ? "selected" : "" }}>Đơn hủy
                                        </option>

                                        <option value="6" {{ $order->order_status == 6 ? "selected" : "" }}>Đã hoàn
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
                                    <input value="{{ $order->customer_address }}" type="text"
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
                                        </tr>
                                        </thead>
                                        <tbody id="list_cart_product">
                                        @php
                                        $total = 0;

                                            @endphp
                                        @foreach($order->detail as $product)
                                             @php
                                             @$total += $product->pivot->product_price * $product->pivot->product_quantity;
                                                 @endphp
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td><img width="125px" src="{{ asset("$product->product_image") }}"
                                                         alt=""></td>
                                                <td>{{ $product->pivot->product_quantity }}</td>
                                                <td>{{ number_format($product->pivot->product_price)    }} $</td>
                                                <td>{{  number_format($product->pivot->product_price * $product->pivot->product_quantity )  }}
                                                    $
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <div>
                                        <h6>Tổng tiền thanh toán : {{ @$total  }}  $<i id="payment_price">

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
                                      {{ $order->order_note }}
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
