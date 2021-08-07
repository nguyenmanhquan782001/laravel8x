@extends("backend.layouts.main")
@section("title" , "Chỉnh sửa role và phân lại quyền cho role")
@section("main_content")
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <form action="{{ route("role.update", ['id' => $role->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Vai trò mới</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="form-group mb-0">
                                    <input value="{{ $role->name }}" type="text" class="form-control" name="name" id="inputText"
                                           placeholder="Vai trò mới.....">
                                </div>
                                <br>
                                @if($errors->has("name"))
                                    <h5><CODE>{{ $errors->first("name") }}</CODE></h5>
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
                                        <h3 class="m-0">Mô tả vai trò</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <div class="form-group mb-0">
                                    <textarea class="form-control" name="desc_role" id="" cols="30" rows="5">{{$role->desc_role}}</textarea>
                                </div>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        @foreach($permissions as $permission)
                            <div class="card text-white bg-warning mb-3" style="">
                                <div class="card-header" style="font-size: 20px">
                                    <input type="checkbox" class="checkbox_wapper" >
                                    <label for="">{{ $permission->name }}</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($permission->getParentId  as $item)

                                            <div class="col-3">
                                                <input
                                                  @foreach($role->permissions as $per_id)
                                                      {{ $item->id == $per_id->pivot->permission_id ? "checked" : "" }}
                                                      @endforeach()

                                                    value="{{ $item->id }}"
                                                       name="permission_id[]"
                                                       type="checkbox"
                                                       class="checkbox_wapper">
                                                <p>{{ $item->name }}</p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                        @endforeach
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
