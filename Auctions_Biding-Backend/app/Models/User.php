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
        $users = User::select('id', 'username', 'role', 'email', 'avatar', 'address', 'status') // chỉ chọn các cột cần thiết
            ->orderBy('created_at', 'DESC')
            ->get();

        // $users = DB::select("select * from users order by created_at DESC");
        return $users;
    }
    public function isAdmin()
    {
        return $this->role === 2 && $this->status === 0;
    }


    public function showStatus()
    {
        return $this->status === 0 ? 'active' : 'lock';
    }
    public function getStatus() {}
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}