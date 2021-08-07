@extends("backend.layouts.main")

@section("title" , "Create")
@section("css")
    .thumb-image{
    float:left;
    width:100px;
    border-radius:5px ;
    position:relative;
    padding:5px;
    }


@endsection

@section("main_content")
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{{ route("product.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Tên sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <input value="{{ old("product_name", "") }}" type="text" class="form-control"
                                           name="product_name" id="inputText"
                                           placeholder="Tên sản phẩm.....">
                                </div>
                                <br>
                                @if($errors->has("product_name"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_name") }}</code></h6>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Giá sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <input value="{{ old("product_price" , " ") }}" type="number" class="form-control"
                                           name="product_price" id="inputText"
                                           placeholder="Giá sản phẩm.....">
                                </div>
                                <br>
                                @if($errors->has("product_price"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_price") }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Thời gian mở bán</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <div class="input-group common_date_picker">
                                        <input value="{{ old("product_publish" , " ") }}" autocomplete="off"
                                               class="datepicker-here  digits"
                                               placeholder="Thời gian mở bán....." name="product_publish" type="text"
                                               data-language="en">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Số lượng sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                {{--  <h6 class="card-subtitle mb-2 mb-2">Usage<code>type="text"</code></h6>--}}
                                <div class="form-group mb-0">
                                    <input type="number" class="form-control" name="product_quantity" id="inputText"
                                           placeholder="Số lượng sản phẩm....">
                                </div>
                                <br>
                                @if($errors->has("product_quantity"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_quantity") }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Chọn danh mục</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">--- Chọn danh mục ---</option>
                                     @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == old("category_id") ? "selected" : "" }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                @if($errors->has("category_id"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("category_id") }}</code>
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Trạng thái mở bán</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="product_status"
                                               id="exampleRadios1" value="1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Đang mở bán
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="product_status"
                                               id="exampleRadios2" value="2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Tạm dừng bán
                                        </label>
                                    </div>
                                </div>
                                <br>
                                @if($errors->has("product_status"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_status") }}</code></h6>
                                @endif

                            </div>
                        </div>
                    </div>


                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Hình ảnh đại diện sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <div id="wrapper">
                                        <div id="image-holder"></div>
                                        <input class="form-control" name="product_image" id="fileUpload" type="file"/>
                                    </div>
                                </div>
                                <br>
                                @if($errors->has("product_image"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_image") }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Album ảnh sản phẩm</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <button type="button"
                                        id="add_new"
                                        style="margin-bottom: 5px;"
                                        class="btn btn-warning">Add Image
                                </button>

                                <div class="form-group mb-0" id="new_img">

                                </div>
                                <br>
                                @if($errors->has("product_gallery"))
                                    <h6 class="card-subtitle mb-2 mb-2">
                                        <code>{{ $errors->first("product_gallery") }}</code></h6>
                                @endif

                            </div>
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
                                <h3 class="m-0">Mô tả sản phẩm</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                                <textarea class="form-control" rows="3" name="product_desc"
                                          id="maxlength-textarea"
                                          placeholder="Mô tả sản phẩm">{{ old("product_desc") }}</textarea>
                    </div>
                    <br>
                    @if($errors->has("product_desc"))
                        <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("product_desc") }}</code></h6>
                    @endif
                </div>
            </div>

            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Mô tả ngắn</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                                <textarea class="form-control" rows="3" name="short_desc" id=""
                                          placeholder="Mô tả sản phẩm ngắn .....">{{ old("short_desc" , "") }}</textarea>
                    </div>
                    <br>
                    @if($errors->has("short_desc"))
                        <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("short_desc" , "") }}</code></h6>
                    @endif

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
@section("append_js")

    <script>
        $(document).ready(function () {
            $("#fileUpload").on('change', function () {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                }
            });
        });


        //

        //CKEDITOR
        CKEDITOR.replace('maxlength-textarea', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
        // Image new append.
        $(document).ready(function () {
            $('#add_new').click(function () {
                var rowId = Date.now();
                $('#new_img').append(`
                            <div class="file-upload"  id="wrapper ${rowId}" style="display: flex ; margin-bottom: 15px">
                               <img style="margin-right: 15px" row_id="${rowId}" src="" width="100px" >

                                     <input style="width: 320px"
                            row_id="${rowId}"
                            onchange="loadFile(event, ${rowId})"
                            class="form-control"
                            name="product_gallery[]"
                            id="fileUpload1"
                            type="file"/>
<div>
                                 <button style="margin-left: 15px; "
                                onclick="removeImg(this)"
                                 class="btn btn-danger">
                                <i class="fas fa-trash-alt">

                                </i>
                                </button>
</div>
                                  </div>
                `);
            })
        })

        function loadFile(event, el_rowId) {
            var reader = new FileReader();
            var output = document.querySelector(`img[row_id="${el_rowId}"]`);
            reader.onload = function () {
                output.src = reader.result;
            };
            if (event.target.files[0] == undefined) {
                output.src = "";
                return false;
            } else {
                reader.readAsDataURL(event.target.files[0]);
            }
        };

        function removeImg(el) {
            $(el).parent().parent().remove();
        }

    </script>
@endsection
