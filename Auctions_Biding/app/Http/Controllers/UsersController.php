<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class UsersController extends Controller
{
    //
    private $users;
    public function __construct()
    {
        $this->users = new User();
    }
    public function index()
    {
        $title = "List User";

        $usersList = $this->users->getAllUsers();
        return view("users.list", compact('title', 'usersList'));
    }
    public function getFormAdd()
    {
        return view("users.add");
    }
    public function logout()
    {
        return view('users.logout');
    }
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(LoginRequest $request)
    {
        // Lấy dữ liệu username và password từ yêu cầu đăng nhập
        $credentials = $request->only('username', 'password');

        // Tìm kiếm người dùng trong cơ sở dữ liệu bằng username
        $user = User::where('username', $credentials['username'])->first();

        // Nếu không tìm thấy người dùng hoặc mật khẩu không đúng
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            // Chuyển hướng lại trang đăng nhập với thông báo lỗi
            return redirect()->back()->withErrors(['login' => 'Thông tin đăng nhập không chính xác.']);
        }

        // Nếu người dùng tồn tại nhưng tài khoản không hoạt động hoặc bị khóa
        if ($user->status !== 0) {
            // Chuyển hướng lại trang đăng nhập với thông báo lỗi
            return redirect()->back()->withErrors(['login' => 'Tài khoản của bạn đã bị khóa hoặc không hoạt động.']);
        }

        // Đăng nhập người dùng vào hệ thống
        Auth::login($user);
        // if (Auth::check()) {
        //     dd('ok'); // Đăng nhập thành công
        // } else {
        //     dd('not'); // Đăng nhập không thành công
        // }
        // Sử dụng hàm isAdmin() để kiểm tra người dùng có phải admin không
        if ($user->isAdmin()) {
            // Chuyển hướng người dùng tới trang admin dashboard nếu là admin
            return redirect()->route('admin.dashboard');
        }
        // dd($user);

        // Nếu không phải admin, chuyển hướng tới trang chủ hoặc trang khác sau khi đăng nhập thành công
        // return redirect()->route('home');
    }

    // public function login(Request $request)
    // {
    //     dd($request->all());
    //     $credentials = $request->only('username', 'password');
    //     return view("index");
    // }
}