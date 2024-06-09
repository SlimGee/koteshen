<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PromoCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('posts', PostController::class);

Route::get('/promo-codes', [PromoCodeController::class, 'index'])->name('promo-codes.index');
Route::get('/promo-codes/create', [PromoCodeController::class, 'create'])->name('promo-codes.create');
Route::post('/promo-codes', [PromoCodeController::class, 'store'])->name('promo-codes.store');
Route::get('/promo-codes/{promo}/edit', [PromoCodeController::class, 'edit'])->name('promo-codes.edit');
Route::delete('/promo-codes/{id}', [PromoCodeController::class, 'destroy'])->name('promo-codes.destroy');
Route::delete('/promo-codes/delete/all', [PromoCodeController::class, 'obliterate'])->name('promo-codes.obliterate');
