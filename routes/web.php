<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CartsController;



Route::get('/', [HomeController::class , 'index' ] );
Auth::routes();

Route::resource('posts', PostsController::class);
Route::resource('carts', CartsController::class);