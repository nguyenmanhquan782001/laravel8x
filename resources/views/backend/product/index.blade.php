@extends("backend.layouts.main")
@section("title" , "Product")
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
        @if(session('success'))

        @endif
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <form action="{{ htmlspecialchars($_SERVER['REQUEST_URI']) }}" method="get"
                                          class="row">
                                        <div class="col-lg-6 form-group">
                                            <select name="product_status" id="" class="form-control ">
                                                <option value="">---Trạng thái sản phẩm mặc định---</option>
                                                <option {{ $status == 1 ? "selected" : "" }} value="1">Đang mở bán</option>
                                                <option {{ $status == 2 ? "selected" : "" }} value="2">Không còn bán</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">---Lọc theo danh mục ---</option>
                                                {!! $categories !!} !}
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <select name="order_by" id="" class="form-control">
                                                <option value="">---Sắp xếp sản phẩm---</option>
                                                <option value="1">Sắp xếp tên từ A-Z</option>
                                                <option value="1">Sắp xếp tên từ Z-A</option>
                                                <option value="3">Sắp xếp theo giá tăng dần</option>
                                                <option value="">Sắp xếp theo giá giảm dần</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input type="search" name="product_name" class="form-control" placeholder="Tìm kiếm 1 sản phẩm">
                                        </div>


                                        <button type="submit" class="btn btn-primary">
                                            <i style="margin-right: 10px" class="fas fa-sort-alpha-down">
                                            </i>
                                            Lọc sản phẩm
                                        </button>

                                        <button style="margin-left: 15px" class="btn btn-warning">
                                            <i style="margin-right: 10px" class="fas fa-broom"></i>
                                            Dọn dẹp tìm kiếm
                                        </button>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Products</h4>
                                    <div class="box_right d-flex lms_block">

                                        <div class="add_button ml-10">
                                            <a href="{{ route("product.create") }}" data-target="#addcategory"
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
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Trạng thái</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <th scope="row"><a href="#"
                                                                   class="question_content">{{ ($products->currentPage() -1 ) * $pageSize + $loop->index + 1 }}</a>
                                                </th>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td><img src="{{ asset("$product->product_image") }}" alt=""
                                                         width="100px"></td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td>{{ $product->category->category_name }}</td>
                                                <td>
                                                    @if($product->product_status == 1)
                                                        <a href="#" class="status_btn">Đang mở</a>
                                                    @else
                                                        <a style="background-color: red" href="#" class="status_btn">Không
                                                            bán</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-url="{{ route("product.remove" , ['id' => $product->id]) }}"
                                                       href="" class="far fa-trash-alt"></a>
                                                    <a href="{{ route("product.edit" , ['id' => $product->id]) }}"
                                                       class="far fa-edit"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $products->onEachSide(5)->links("vendor.pagination.custom") }}

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
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
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
