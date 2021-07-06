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
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Product Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Products</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{ route("product.create") }}"  data-target="#addcategory" class="btn_1">Add New</a>
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
                                            <th scope="col">Giắ</th>
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
                                            <th scope="row"> <a href="#" class="question_content">{{ $loop->index + 1 }}</a></th>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td><img src="{{ asset("$product->product_image") }}" alt="" width="100px"> </td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>
                                                @if($product->product_status == 1)
                                                    <a href="#" class="status_btn">Đang mở</a>
                                                @else
                                                    <a style="background-color: red" href="#" class="status_btn">Không bán</a>
                                                @endif

                                            </td>
                                            <td>
                                                <a data-url=""
                                                   href="{{ route("product.remove" , ['id' => $product->id]) }}"  class="far fa-trash-alt"></a>
                                                <a href="{{ route("product.edit" , ['id' => $product->id]) }}"
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
