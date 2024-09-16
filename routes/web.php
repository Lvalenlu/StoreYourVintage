<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Administrador;

Route::get('/', function () {
    return view('navbar');
});

Auth::routes();

Route::get('/home',         [AdminController::class,     'index'])->name('home');

Route::get('/prueba', function(){
    //Crear un administrador
    $admin = new Administrador;

    $admin->nombre = "Laura henao";
    $admin->cedula = "128937812";
    $admin->email = "lbustos756@gmail.com";
    $admin->contrasena = "123aa";
    $admin->cargo = "no se pero abril el mejor";
    $admin->gestor = "0";

    $admin->save();


    // $admin = Administrador::find(1);   Buscar un regisrto

    //   Encontrar un registro y modificarlo
    /*$admin = Administrador::where('id', '5')
                ->first();

    $admin->contrasena = 'abril123';
    $admin->save();
     return $admin;*/

    /* para traer registros por medio de un filtro
    $admin =Administrador::where('id', '>','1')->get();
    return $admin; */

    // Trae todos los registros
    //$admin = Administrador::Where('nombre','Andres');
    //$admin->delete();

});


// Route::get('/register',     [AuthController::class,     'indexRegister'])->name('register');
// Route::post('/register',    [AuthController::class,     'storeRegister']);

// Route::get('/login',        [AuthController::class,     'createLogin'])->name('login');
Route::post('/login',       [AuthController::class,     'storeLogin']);
Route::resource('products', ProductController::class)->names('products');

