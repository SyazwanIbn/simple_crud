<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;


Route::resource('posts', PostController::class);  // bila guna route::resource laravel automatik set route nama plural
