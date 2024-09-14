<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return "hola";
});

Route::get('/products', function(){
    return view('products');
});

Route::get('/navbar', function(){
    return view('navbar');
});

Route::get('/posts', [AdminController::class,  'index']);
Route::get('/login',[AdminController::class,   'login']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
