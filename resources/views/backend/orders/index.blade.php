@extends("backend.layouts.main")
@section('title', 'Đơn hàng')
@section('css')
    .far {
    font-size: 25px;
    }
    .fa-trash-alt {
    color: red;
    }
    .fa-edit {
    color: yellowgreen;
    margin-left: 5px;
    }
    .far:hover {
    color: #f1b0b7;

    }

@endsection
@section("main_content")
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Orders Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Order</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{ route("order.create") }}" data-target="#addcategory"
                                               class="btn_1">Add New</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active ">
                                        <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên khách</th>
                                            <th scope="col">SDT</th>
                                            <th scope="col">Tổng SP</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Trạng thái đơn</th>

                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <th scope="row"><a href="#"
                                                                   class="question_content">{{ $loop->index + 1 }}</a>
                                                </th>
                                                <td>{{ $order->customer_name }}</td>
                                                <td>{{ $order->customer_phone }}</td>

                                                <td>{{ $order->total_product}}</td>
                                                <td>{{ $order->total_price }}</td>
                                                <td>{{ $order->customer_address }}</td>

                                                @if($order->order_status === 1)
                                                    <td><a style="background-color: yellow" href="#" class="status_btn">Waitting</a>
                                                    </td>
                                                @elseif($order->order_status == 2)
                                                    <td><a style="background-color: red" href="#" class="status_btn">Waitted</a>
                                                    </td>
                                                @elseif($order->order_status == 3)
                                                    <td><a href="#" class="status_btn">Transporting</a></td>
                                                @elseif($order->order_status == 4)
                                                    <td><a style="background-color: blue" href="#" class="status_btn">Completed</a>
                                                    </td>
                                                @elseif($order->order_status == 5)
                                                    <td><a style="background-color: blueviolet" href="#"
                                                           class="status_btn">Hủy đơn</a></td>
                                                @elseif($order->order_status == 6)
                                                    <td><a style="background-color: brown" href="#" class="status_btn">Hoàn
                                                            iền</a></td>
                                                @endif
                                                <td>
                                                    <a data-url="{{ route("order.delete", ['id' => $order->id]) }}"
                                                       href="" class="far fa-trash-alt"></a>
                                                    <a href="{{ route("order.edit" , ['id' => $order->id]) }}"
                                                       class="far fa-edit"></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>

@endsection
@section("append_js")
    <script>
        function removeProduct(e) {
            e.preventDefault();
            let urlRequest = $(this).data('url');
            let that = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "Xóa đơn hàng + xóa luôn trong đơn hàng chi tiết",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý xóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: urlRequest,
                        success: function (data) {
                            if (data.code == 200) {
                                that.parent().parent().remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        },
                        error: function () {
                        }
                    })
                }
            })
        }
        $(function () {
            $(document).on('click', '.fa-trash-alt', removeProduct)
        })
    </script>
@endsection
