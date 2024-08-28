<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'avatar',
        'address',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function getAllUsers()
    {
        $users = DB::select("select * from users order by created_at DESC");
        return $users;
    }
    public function isAdmin()
    {
        $user  = Auth::user();
        // if (Auth::check()) {
        //     dd('ok'); // Đăng nhập thành công
        // } else {
        //     dd('not'); // Đăng nhập không thành công
        // }
        // dd($username = $user->username);
        // dd(Hash::check(Auth::user()));
        if (!$user) {
            return false;
        }


        if ($user->role === 2 && $user->status === 0) {


            return true;
        }
        return false;
    }


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
