<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user_login = session('user-login' , false);
        if ($user_login && isset($user_login['id']) && ($user_login['id'] > 0)) {
            return redirect()->route('dashboard.index');
        }
        return view("backend.login.login");
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
        $user = $this->user->where('email', '=', $email)->first();
        if (!$user) {
            return redirect()->back()->withInput()->with("toast_info", "Email không chính xác hoặc chưa có trong hệ thống");
        }
        if (isset($user->id) && ($user->id > 0) && Hash::check($password, $user->password)) {
            $userDetail = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
            session(['user-login' => $userDetail]);
            if ($remember == "on") {
                $minutes = 3600 * 30;
                $hash = $user->id . $user->email . $user->password;
                $cookieValue = Hash::make($hash);
                cookie('remember', "$cookieValue", "$minutes");
                $this->user->where("id", $user->id)->update([
                    'remember_token' => $cookieValue,
                ]);
            }
        }

        return redirect()->route("dashboard.index")->with('toast_success', "Chào mừng bạn đến với trang admin");
    }

    public function logout(Request $request)
    {
        cookie('remember' , '' , -3600*30);
        $request->session()->flush();
        return redirect()->route('login')
            ->with('toast_success', 'Đã đăng xuất ! Mời đăng nhập để tiếp tục dịch vụ');

    }
}
