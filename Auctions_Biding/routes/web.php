<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('index');
})->middleware('admin');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/listUsers', [UsersController::class, 'index'])->name('listUsers');
        Route::get('/addUsers', [UsersController::class, 'getFormAdd'])->name('addUsers');
    });
    Route::get('/', function () {
        return view('index');
    })->name('admin.dashboard');

    Route::get('/logout', [UsersController::class, "logout"])->name('admin.logout');
    Route::get('/register', [UsersController::class, "register"])->name('admin.register');
});
Route::get('/showLoginForm', function () {
    return view('users.login');
})->name('admin.showLoginForm');
Route::post('/login', [UsersController::class, "login"])->name('admin.login.post');
Route::get('/forgot-pw', function () {
    return view('users.forgotPassword');
});
Route::get('/err', function () {
    return view('err')->name('errors');
});
