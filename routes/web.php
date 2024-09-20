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
Route::put('/update/password',  [AuthController::class,     'update'])->name('update.password');
Route::get('/home',             [ProductController::class,  'index'])->name('home');
Route::get('/profile',          [UserController::class,     'show'])->name('profile');
Route::get('/customers/audit',  [AuditController::class,    'index'])->name('audits.index');

Route::resource('products',     ProductController::class)->names('products');
Route::resource('categories',   CategoryController::class)->names('categories');
Route::resource('users',        UserController::class)->names('users');
Route::resource('customers',    CustomerController::class)->names('customers');
Route::get('/change', function(){return view('auth.passwords.changePassword');})->name('change');
Route::get('/prueba', function(){
    //Crear un User
    // $user = new User;

    // $user->name = "Laura henao";
    // $user->document = "128937812";
    // $user->email = "lbustos756@gmail.com";
    // $user->password = "123aa";
    // $user->charge = "no se pero abril el mejor";
    // $user->is_manager = "0";

    // $user->save();


    // $User = User::find(1);   Buscar un regisrto

    //   Encontrar un registro y modificarlo
    /*$User = User::where('id', '5')
                ->first();


    $User->password = 'abril123';
    $User->save();
     return $User;*/

    /* para traer registros por medio de un filtro
    $User =User::where('id', '>','1')->get();
    return $User; */

    // Trae todos los registros
    //$User = User::Where('name','Andres');
    //$User->delete();


    // $User = Auth::user();
    // return $User;
});
