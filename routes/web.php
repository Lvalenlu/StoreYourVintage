<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('navbar');
});

Route::get('/products', function(){
    return view('v4_productos');
});

Route::get('/app', function(){
    return view('layouts/app');
});




Auth::routes();
Route::get('/login',        [App\Http\Controllers\AdminController::class,   'create']);
Route::get('/loginAdmin',   [App\Http\Controllers\AdminController::class,   'show'])->name('login');
Route::get('/home',         [App\Http\Controllers\HomeController::class,    'index'])->name('home');