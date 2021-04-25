<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\AccountStatusController;

Route::get('/', [HomeController::class , 'index' ] );
Auth::routes();


Route::middleware("auth")->group(function() {
      Route::resource('accountStatus', AccountStatusController::class);
      Route::middleware("accountStatusCheck")->group(function() {

            Route::resource('posts', PostsController::class);
            Route::resource('carts', CartsController::class);

      });
});