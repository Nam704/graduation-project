<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\Web\UsersController;
use App\Http\Controllers\Web\AdminsController;


Route::get('/', function () {
    return view('index');
})->middleware('admin');
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/listUsers', [UsersController::class, 'index'])->name('listUsers');
        Route::get('/addUser', [UsersController::class, 'getFormAdd'])->name('addUser');
        Route::post('/addUser', [UsersController::class, 'addUser'])->name('addUser');
        Route::get('/destroy/{user}', [UsersController::class, 'destroy'])->name('destroyUser');
        Route::get('/edit/{user}', [UsersController::class, 'getFormEdit'])->name('editUser');
        Route::post('/edit/{user}', [UsersController::class, 'edit'])->name('editUser');
        Route::get('/lock/{user}', [UsersController::class, 'lockAndActive'])->name('lock');
    });
    Route::get('/', function () {
        return view('index');
    })->name('admin.dashboard');

    Route::get('/logout', [AdminsController::class, "logout"])->name('admin.logout');
    Route::get('/register', [AdminsController::class, "register"])->name('admin.register');
});
Route::get('/showLoginForm', function () {
    return view('admin.login');
})->name('admin.showLoginForm');
Route::get('/showLogout', function () {
    return view('admin.logout');
})->name('admin.showLogout');
Route::post('/login', [AdminsController::class, "login"])->name('admin.login.post');