<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // return view('list');
        $users =  DB::select('select * from users');
        dd($users);
    });
});
