<?php

use App\Http\Controllers\AuditController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {return redirect()->route('login');});

Auth::routes();
Route::get('/changes/password', [AuthController::class,     'changes'])->name('changes.password');
Route::get('/register',         [AuthController::class,     'indexRegister'])->name('register');
Route::get('/create/password',  [AuthController::class,     'create'])->name('create.password');
Route::get('/reset/password',   [AuthController::class,     'reset'])->name('reset.password');
Route::get('/audits/{option}',  [AuditController::class,    'index'])->name('audits.index');
Route::get('/home',             [ProductController::class,  'index'])->name('home');
Route::post('/changes/password',[AuthController::class,     'changesPassword'])->name('changes.password');
Route::post('/product',         [ProductController::class,  'filterProducts'])->name('product');
Route::post('/send/email',      [AuthController::class,     'send'])->name('send.email');
Route::put('/change/password',  [AuthController::class,     'updatePassword'])->name('change.password');
Route::put('/update/password',  [AuthController::class,     'update'])->name('update.password');
Route::resource('categories',   CategoryController::class)->names('categories');
Route::resource('customers',    CustomerController::class)->names('customers');
Route::resource('products',     ProductController::class)->names('products');
Route::resource('users',        UserController::class)->names('users');
Route::middleware('auth')->group(function() {
Route::get('/profile',          [UserController::class, 'show'])->name('profile');
});




