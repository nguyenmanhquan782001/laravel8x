@extends("backend.layouts.main")
@section("title" , "Chỉnh sửa user")
@section("css")
    body{
    background: #f5f5f5;
    margin-top:20px;
    }

    .ui-w-80 {
    width: 80px !important;
    height: auto;
    }

    .btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
    }

    label.btn {
    margin-bottom: 0;
    }

    .btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
    }

    .btn {
    cursor: pointer;
    }

    .text-light {
    color: #babbbc !important;
    }

    .btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
    }

    .btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
    }

    .card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
    }

    .row-bordered {
    overflow: hidden;
    }

    .account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
    }
    .account-settings-links .list-group-item.active {
    font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
    }
    .account-settings-multiselect ~ .select2-container {
    width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
    }
    .light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
    }

    .checkboxThree {
    width: 120px;
    height: 40px;
    background: #333;
    margin: 20px 60px;

    border-radius: 50px;
    position: relative;
    }

    /**
    * Create the text for the On position
    */
    .checkboxThree:before {
    content: 'On';
    position: absolute;
    top: 12px;
    left: 13px;
    height: 2px;
    color: #26ca28;
    font-size: 16px;
    }

    /**
    * Create the label for the off position
    */
    .checkboxThree:after {
    content: 'Off';
    position: absolute;
    top: 12px;
    left: 84px;
    height: 2px;
    color: #111;
    font-size: 16px;
    }

    /**
    * Create the pill to click
    */
    .checkboxThree label {
    display: block;
    width: 52px;
    height: 22px;
    border-radius: 50px;

    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -o-transition: all .5s ease;
    -ms-transition: all .5s ease;
    transition: all .5s ease;
    cursor: pointer;
    position: absolute;
    top: 9px;
    z-index: 1;
    left: 12px;
    background: #ddd;
    }

    /**
    * Create the checkbox event for the label
    * @type {[type]}
    */
    .checkboxThree input[type=checkbox]:checked + label {
    left: 60px;
    background: #26ca28;
    }
    input[type=checkbox] {
    visibility: hidden;
    }


@endsection
@section("main_content")
    <div class="main_content_iner ">
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Account settings
            </h4>
            <form action="{{ route("user.update" , ['id' => $user->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card overflow-hidden">
                    <div class="row no-gutters row-bordered row-border-light">
                        <div class="col-md-3 pt-0">
                            <div class="list-group list-group-flush account-settings-links">
                                <a class="list-group-item list-group-item-action active" data-toggle="list"
                                   href="#account-general">General</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list"
                                   href="#account-info">Info</a>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center">
                                        @if($user->avatar === "")
                                            <img
                                                src="https://anhdep123.com/wp-content/uploads/2021/05/hinh-avatar-trang.jpg"
                                                alt="" class="d-block ui-w-80">
                                        @else
                                            <img src="{{ asset("$user->avatar") }}" alt=""
                                                 class="d-block ui-w-80">
                                        @endif
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new photo
                                                <input type="file" name="avatar" class="account-settings-fileinput"
                                                       disabled>
                                            </label> &nbsp;
                                            <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                            <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of
                                                800K
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Full name</label>
                                            <input disabled name="name" type="text" class="form-control mb-1"
                                                   value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Số điện thoại</label>
                                            <input disabled name="phone_number" type="number" class="form-control"
                                                   value="{{ $user->phone_number }}">
                                        </div>
                                        <div class="form-group">
                                            <section>
                                                <label class="form-label">{{ $user->status == 1 ?
                                                          "Khóa tài khoản này" : "Mở lại tài khoản này" }}</label>
                                                <div class="checkboxThree">
                                                    <input {{ ($user->status == 1 ? "checked" : "") }} type="checkbox"
                                                           name="status" id="checkboxThreeInput"
                                                           value="on">
                                                    <label for="checkboxThreeInput"></label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="white_card card_height_100 mb_30">
                                                    <label for="">Chọn roles cho user</label>
                                                    <div class="white_card_body">
                                                        <div class="form-group mb-0">
                                                            <div wire:ignore>
                                                                <select name="role_id[]"
                                                                        class="js-example-placeholder-multiple js-states form-control"
                                                                        id="select2-dropdown" multiple="multiple"
                                                                        autocomplete="off">
                                                                    @foreach($roles as $role)
                                                                        <option
                                                                            {{ $role_active->contains('id' , $role->id) ? "selected" : "" }}
                                                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input disabled name="email" type="text" class="form-control mb-1"
                                                   value="{{ $user->email }}">
                                            <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                <a href="javascript:void(0)">Resend confirmation</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-info">
                                    <div class="card-body pb-2">

                                        <div class="form-group">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" rows="5">Nguyễn Mạnh Quân , đẹp trai , vui tính ,  chưa có người yêu
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Birthday</label>
                                            <input type="text" class="form-control" value="Aug 7, 2001">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="custom-select">
                                                <option selected>Việt Nam</option>
                                                <option>UK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                                    <div class="card-body pb-2">

                                        <h6 class="mb-4">Contacts</h6>
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" value="0971.399.424">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input type="text" class="form-control" value=""
                                                   placeholder="Địa chỉ website của bạn...">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                    <a href="{{ route("user.index") }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("append_js")
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
@endsection
