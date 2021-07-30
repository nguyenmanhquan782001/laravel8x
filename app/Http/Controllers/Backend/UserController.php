<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\RolesModel;
use App\Traits\StorageImage;
use Barryvdh\Debugbar\Facade;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use StorageImage;

    protected $user;
    protected $rolesModel;

    public function __construct(User $user, RolesModel $rolesModel)
    {
        $this->user = $user;
        $this->rolesModel = $rolesModel;
    }

    public function index()
    {
        try {
            DB::beginTransaction();
            $session_user = session('user-login', false);
            $id = $session_user['id'];
            $users = DB::table('users')->where('id', '!=', $id)->get();
            DB::commit();
            return view("backend.user.index", compact('users'));

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }

    }

    public function create()
    {
        try {
            DB::beginTransaction();
            $roles = $this->rolesModel->all();
            $data = [];
            $data['roles'] = $roles;
            DB::commit();
            return view("backend.user.create", $data);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }

    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $ruler = [
                'name' => "required|min:6",
                'email' => "required|unique:users,email|email",
                'phone_number' => "required|unique:users,phone_number",
                'password' => 'required|min:6|required_with:password_confirmation',
                'password_confirmation' => "required|same:password",


            ];
            $message = [
                'name.required' => "Tên không được để trống",
                'name.min' => "Tên phải lớn hơn 6 kí tự",
                'email.required' => "Email không được để trống",
                'email.unique' => "Email đã được sử dụng",
                'email.email' => "Phải nhập đúng định dạng email",
                'phone_number.required' => "Số điện thoại không được để trống",
                'phone_number.unique' => "Số điện thoại này đã được sử dụng",
                "password.required" => "Password không được để trống",
                "password.min" => "Password phải trên 6 kí tự",
                "password_confirmation.required" => "Mật khẩu xác nhận không được để trống",
                'password_confirmation.same' => "Mật khẩu không khớp"
            ];
            $validate = Validator::make($request->all(), $ruler, $message);
            $name = $request->input("name", '');
            $email = $request->input("email", '');
            $phone = $request->input("phone_number", '');
            $password = $request->input("password", '');
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $dataImageAvatar = $this->StorageImage($request, 'avatar', 'avatar_use');
            if (!empty($dataImageAvatar)) {
                $avatar = $dataImageAvatar['file_path'];
                $avatar_name = $dataImageAvatar['file_name'];
            }
            $user = $this->user;
            $user->name = $name;
            $user->email = $email;
            $user->phone_number = $phone;
            $user->password = Hash::make($password);
            if ($request->avatar === null) {
                $user->avatar = "";
                $user->avatar_name = "";
            } else {
                $user->avatar = $avatar;
                $user->avatar_name = $avatar_name;
            }
            DB::commit();
            $user->save();
            $roleId = $request->role_id;
            $user->roles()->attach($roleId);
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }

    }

    public function profile($id)
    {
        $my_account = $this->user->find($id);
        return view("backend.profile.profile", compact('my_account'));
    }

    public function SaveProfile(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $my_account = $this->user->find($id);
            $password_current = $request->current_password;
            $password_new = $request->password;
            if (strlen($password_new) > 0) {
                if (Hash::check($password_current, $my_account->password) == false) {
                    return redirect()->back()->withInput()->with('toast_info', 'Mật khẩu cũ không chính xác');
                }
                $ruler = [
                    'password' => "min:6",
                    'password_confirmation' => "same:password"
                ];
                $message = [
                    'password.min' => "Mật khẩu phải lớn hơn 6 kí tự",
                    'password_confirmation.same' => "Không trùng với password mới"
                ];
                $validate = Validator::make($request->all(), $ruler, $message);
                if ($validate->fails()) {
                    return redirect()->back()->withInput()->withErrors($validate)->with('toast_warning', "Có lỗi xảy ra kiểm tra lại");
                } else {
                    $my_account->password = Hash::make($password_new);
                }
            }
            $myImage = $this->StorageImage($request, 'avatar', 'avatar_use');
            if (!empty($myImage)) {
                $avatar = $myImage['file_path'];
                $avatar_name = $myImage['file_name'];
            }
            if ($request->hasFile('avatar')) {
                if ($my_account->avatar) {
                    Storage::delete($my_account->avatar);
                }
                $my_account->avatar = $avatar;
                $my_account->avatar_name = $avatar_name;
            }
            DB::commit();
            $my_account->save();
            return redirect()->route('dashboard.index')->with('toast_success', 'Sửa thông tin thành công');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('404');
        }
    }

    public function edit($id)
    {

        $user = $this->user->find($id);
        return view("backend.user.edit", compact('user'));
    }

    public function update(Request $request, $id)
    {

        $status = $request->input("status");
        $user = $this->user->find($id);
        if ($status === "on") {
            $status = 1;

        } else {
            $status = 0;
        }
        $user->status = $status;
        $user->save();
        return redirect()->route("user.index")->with("toast_success", "Đã sửa đổi trạng thái tài khoản");


    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        if ($user->avatar) {
            $delete_img = str_replace("/storage", '/public', $user->avatar);
            Storage::delete($delete_img);
        }
        $user->delete();
        return response()->json([
            'code' => '200',
            'message' => 'success'
        ], 200);

    }
}
