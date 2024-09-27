<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(LoginRequest $request)
    {
        // Lấy dữ liệu username và password từ yêu cầu đăng nhập
        $credentials = $request->only('username', 'password');

        // Tìm kiếm người dùng trong cơ sở dữ liệu bằng username
        $user = User::where('username', $credentials['username'])->first();
        if ($user) {
            if (!Hash::check($request->input('password'), $user->password)) {
                return redirect()->back()->withErrors(['password' => "Incorrect password"]);
            }
            if ($user->status !== 0) {
                return redirect()->back()->withErrors(['login' => 'Your account has been locked']);
            }
            if (!$user->isAdmin()) {
                return redirect()->back()->withErrors(['login' => 'This account is not an administrator account.']);
            }


            Auth::login($user);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['login' => 'Incorrect login information.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showLogout');
    }
}