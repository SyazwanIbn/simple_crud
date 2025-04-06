<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;


// 👇 Ini route untuk root (/)
Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class);  // bila guna route::resource laravel automatik set route nama plural
