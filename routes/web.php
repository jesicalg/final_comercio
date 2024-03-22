<?php

use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
Route::get('novedades', [\App\Http\Controllers\HomeController::class, 'posts'])
    ->name('posts');
Route::get('webhosting', [\App\Http\Controllers\ProductController::class, 'showcase'])
    ->name('product.showcase.view');


//Register
Route::get('registrarse', [\App\Http\Controllers\AuthController::class, 'formRegister'])
    ->name('auth.formRegister');
Route::post('registrarse', [\App\Http\Controllers\AuthController::class, 'processRegister'])
    ->name('auth.processRegister');

//Login
Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');

//Logout
Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.processLogout')
    ->middleware('auth');

//Contract
Route::post('servicio/contratado', [\App\Http\Controllers\ProductController::class, 'processContract'])
    ->name('product.processContract')
    ->middleware('auth');
Route::get('servicio/bienvenido', [\App\Http\Controllers\ProductController::class, 'productWelcome'])
    ->name('product.welcome')
    ->middleware('auth');

//ADMIN
Route::get('novedades/gestion', [\App\Http\Controllers\AdminController::class, 'postCrud'])
    ->name('posts.crud')
    ->middleware(['admin']);

Route::get('clientes/listado', [\App\Http\Controllers\AdminController::class, 'customerList'])
    ->name('customer.list')
    ->middleware(['admin']);

Route::get('novedades/nuevo', [\App\Http\Controllers\AdminController::class, 'formNewPost'])
    ->name('admin.newPost')
    ->middleware(['admin']);
Route::post('novedades/nuevo', [\App\Http\Controllers\AdminController::class, 'processNewPost'])
    ->name('admin.processPost')
    ->middleware(['admin']);

Route::get('novedades/editar/{id}', [\App\Http\Controllers\AdminController::class, 'formUpdatePost'])
    ->name('admin.updatePost')
    ->middleware(['admin']);
Route::get('novedades/eliminar/{id}', [\App\Http\Controllers\AdminController::class, 'formDeletePost'])
    ->name('admin.deletePost')
    ->middleware(['admin']);
Route::post('novedades/editar/{id}', [\App\Http\Controllers\AdminController::class, 'processUpdatePost'])
    ->name('admin.processUpdatePost')
    ->middleware(['admin']);
