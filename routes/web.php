<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\User;

Route::get('/', function () {
    return view('navbar');
});

    Auth::routes();

Route::get('/home',         [UserController::class,     'index'])->name('home');

Route::get('/prueba', function(){
    //Crear un User
    $user = new User;

    $user->name = "Laura henao";
    $user->document = "128937812";
    $user->email = "lbustos756@gmail.com";
    $user->password = "123aa";
    $user->charge = "no se pero abril el mejor";
    $user->is_manager = "0";

    $user->save();


    // $User = User::find(1);   Buscar un regisrto

    //   Encontrar un registro y modificarlo
    /*$User = User::where('id', '5')
                ->first();

    $User->contrasena = 'abril123';
    $User->save();
     return $User;*/

    /* para traer registros por medio de un filtro
    $User =User::where('id', '>','1')->get();
    return $User; */

    // Trae todos los registros
    //$User = User::Where('nombre','Andres');
    //$User->delete();

});


//Route::get('/register',     [AuthController::class,     'indexRegister'])->name('register');
//Route::post('/register',    [AuthController::class,     'storeRegister']);

// Route::get('/login',        [AuthController::class,     'createLogin'])->name('login');
Route::post('/login',       [AuthController::class,     'storeLogin']);
Route::resource('products', ProductController::class)->names('products');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
