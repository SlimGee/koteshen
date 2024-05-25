<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('posts', PostController::class);
