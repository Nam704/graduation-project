<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

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
        $destinationPath = "storage/uploads/avatars/";
        $usersList = $this->users->getAllUsers();
        return view("users.list", compact('title', 'usersList', 'destinationPath'));
    }
    public function getFormAdd()
    {
        return view("users.add");
    }
    public function  addUser(UserRequest $request)
    {
        // dd('ok');
        $input = $request->all();
        if ($image = $request->file('avatar')) {
            $destinationPath = 'public/uploads/avatars/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $profileImage);
            $input['avatar'] = "$profileImage";
        }
        User::create($input);
        return redirect()->route('admin.users.listUsers')->with('success', 'User created successfully.');
    }
    public function destroy(User $user)
    {
        if ($user->avatar) {
            $oldImagePath = 'public/uploads/avatars/' . $user->avatar;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
        }
        $user->delete();
        return redirect()->route('admin.users.listUsers')->with('success', 'User destroy successfully');
    }
    public function getFormEdit(User $user)
    {
        // dd($user->username);
        return view('users.edit', compact('user'));
    }
    function lockAndActive(User $user)
    {

        $isLock = ($user->status == '1') ? true : false;
        if ($isLock) {
            $user->status = '0';
            $user->save();
            return redirect()->route('admin.users.listUsers')->with('success', 'User actived successfully');
        } else {
            $user->status = '1';
            $user->save();
            return redirect()->route('admin.users.listUsers')->with('success', 'User locked successfully');
        }
    }
    public function edit(User $user, UserRequest $request)
    {
        // Lấy dữ liệu từ request, ngoại trừ password và rePassword
        $data = $request->except(['password', 'rePassword']);

        // Kiểm tra xem có ảnh mới được tải lên hay không
        if ($image = $request->file('avatar')) {
            // Nếu người dùng đã có ảnh đại diện cũ, xóa ảnh đó trước
            if ($user->avatar) {
                $oldImagePath = 'public/uploads/avatars/' . $user->avatar;
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            // Đường dẫn lưu trữ ảnh đại diện
            $destinationPath = 'public/uploads/avatars/';
            // Tạo tên file dựa trên ngày và thời gian hiện tại
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // Lưu ảnh mới vào thư mục đã chỉ định
            $image->storeAs($destinationPath, $profileImage);
            // Cập nhật dữ liệu 'avatar' trong mảng $data
            $data['avatar'] = "$profileImage";
        }

        // Cập nhật dữ liệu người dùng
        $user->update($data);

        // Chuyển hướng về danh sách người dùng với thông báo thành công
        return redirect()->route('admin.users.listUsers')->with('success', 'User updated successfully.');
    }
}