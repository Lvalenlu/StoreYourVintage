<?php

// Importación de controladores necesarios
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirige la ruta raíz a la página de inicio de sesión
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de autenticación (login, registro, restablecimiento de contraseña)
Auth::routes();
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::get('/create/password', [AuthController::class, 'create'])->name('create.password');
Route::get('/changes/password', [AuthController::class, 'changes'])->name('changes.password');
Route::get('/reset/password', [AuthController::class, 'reset'])->name('reset.password');
Route::post('/send/email', [AuthController::class, 'send'])->name('send.email');
Route::put('/change/password', [AuthController::class, 'updatePassword'])->name('change.password');
Route::post('/changes/password', [AuthController::class, 'changesPassword'])->name('changes.password');
Route::put('/update/password', [AuthController::class, 'update'])->name('update.password');

// Ruta para la página principal después del inicio de sesión
Route::get('/home', [ProductController::class, 'index'])->name('home');

// Grupo de rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('profile'); // Ruta para mostrar el perfil del usuario
});

// Rutas para auditorías
Route::get('/audits/{option}', [AuditController::class, 'index'])->name('audits.index');

// Ruta para filtrar productos
Route::post('/product', [ProductController::class, 'filterProducts'])->name('product');

// Rutas de recursos (CRUD) para varias entidades
Route::resource('products', ProductController::class)->names('products');
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('users', UserController::class)->names('users');
Route::resource('customers', CustomerController::class)->names('customers');

