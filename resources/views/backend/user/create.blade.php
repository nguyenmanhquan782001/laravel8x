@extends("backend.layouts.main")
@section("title", "Create User")
@section("main_content")
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{{ route("user.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Họ và tên</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <input value="{{ old("name", "") }}" type="text" class="form-control" name="name" id="inputText"
                                           placeholder="Full name...">
                                </div>
                                <br>
                                @if($errors->has("name"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("name") }}</code></h6>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Email</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <input value="{{ old("email" , "") }}" type="Email" class="form-control" name="email" id="inputText"
                                           placeholder="Email....">
                                </div>
                                <br>
                                @if($errors->has("email"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("email") }}</code></h6>
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
                                {{--  <h6 class="card-subtitle mb-2 mb-2">Usage<code>type="text"</code></h6>--}}
                                <div class="form-group mb-0">
                                    <input type="number" value="{{ old("phone_number" , "") }}" class="form-control" name="phone_number" id="inputText"
                                           placeholder="Số điện thoại....">
                                </div>
                                <br>
                                @if($errors->has("phone_number"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("phone_number") }}</code></h6>
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
                                        <h3 class="m-0">Password</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                {{--  <h6 class="card-subtitle mb-2 mb-2">Usage<code>type="text"</code></h6>--}}
                                <div class="form-group mb-0">
                                    <input value="{{ old("password" , "") }}" type="password" class="form-control" name="password" id="inputText"
                                           placeholder="Nhập password....">
                                </div>
                                <br>
                                @if($errors->has("password"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("password") }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Nhập lại password</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                {{--  <h6 class="card-subtitle mb-2 mb-2">Usage<code>type="text"</code></h6>--}}
                                <div class="form-group mb-0">
                                    <input value="{{ old("password_confirmation" , "") }}" type="password" class="form-control" name="password_confirmation" id="inputText"
                                           placeholder="Nhập lại password">
                                </div>
                                <br>
                                @if($errors->has("password_confirmation"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("password_confirmation") }}</code></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Avatar</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <div id="wrapper">
                                        <div id="image-holder"></div>
                                        <input class="form-control" name="avatar" id="fileUpload" type="file"/>
                                    </div>
                                </div>
                                <br>
                                @if($errors->has("avatar"))
                                    <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first("avatar") }}</code></h6>
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
                                        <h3 class="m-0">Vai trò</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <div wire:ignore>
                                        <select name="role_id[]" class="js-example-placeholder-multiple js-states form-control"

                                                id="select2-dropdown" multiple="multiple" autocomplete="off">
                                          @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <button type="button" class="btn mb-3 btn-danger"><i class="fas fa-hand-point-left mr-2"></i>Quay lại
                    </button>
                </a>
                <button type="submit" class="btn mb-3 btn-success"><i class="fas fa-share-square mr-2"></i>Lưu lại</button>
            </form>

        </div>
    </div>

@endsection
@section("append_js")

@endsection
@push("script")
    <script>
        $(document).ready(function () {
            $('#select2-dropdown').select2({
                placeholder: "Chọn quyền user",
                allowClear: true
            });
            $('#select2-dropdown').on('change', function (e) {
                let data = $('#select2-dropdown').select2("val");
                this.set('ottPlatform', data);
            });
        });


    </script>

@endpush
