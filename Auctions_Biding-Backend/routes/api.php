<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/list-product', [ProductController::class, 'index']);
// Route::apiResource('/product', ProductController::class);