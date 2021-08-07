<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    private $user;

    public function __construct(User $user)
    {

        $this->user = $user;
    }

    public function LoginPage()
    {
        if (Auth::user() && Auth::id() > 0) {
            return redirect()->route("dashboard.index");
        } else {
            return view("backend.login.login");
        }
    }

    public function LoginPost(Request $request)
    {

        $ruler = [
            'email' => "required",
            'password' => "required",
        ];
        $message = [
            'email.required' => "Cannot empty email!!",
            'password.required' => "Cannot empty password!!"
        ];
        $validateLogin = Validator::make($request->all(), $ruler, $message);
        if ($validateLogin->fails()) {
            return redirect()->back()->withInput()->withErrors($validateLogin);
        }
        $email = $request->input("email", '');
        $password = $request->input("password", '');
        $remember = $request->input("remember_me");
        if (Auth::attempt(['email' => $email, 'password' => $password , 'status' => 1], $remember)) {
            return redirect()->route("dashboard.index")->with('toast_success', "Chào mừng bạn đến với trang admin");
        }
        $user = $this->user->where('email', '=', $email)->first();
        if (!$user) {
            return redirect()->back()->withInput()->with("toast_info", "Email không chính xác hoặc chưa có trong hệ thống");
        }
        if (Hash::check($password, $user->password) == false) {
            return redirect()->back()->withInput()->with("toast_info", "Mật khẩu chưa chính xác");
        }
       else{
           return redirect()->back()->withInput()->with('toast_warning', "Tài khoản này có thể đã bị khóa vui lòng kiểm tra lại");
       }


    }

    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('login')
            ->with('toast_success', 'Đã đăng xuất ! Mời đăng nhập để tiếp tục dịch vụ');

    }
}
