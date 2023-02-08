<?php

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\LogInController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/category', function () {
    return view('category');
});

Route::get('/admin/products', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/user', function () {
    return view('user');
});

Route::get('/shoppingCart', function () {
    return view('/shoppingCart');
})->name('shoppingCart');

//Para cargar las categorías usamos una sola vista. El controlador carga los datos de la seleccionada por url

Route::get('/category/{id?}', [CategoryController::class, "category"])->name('category');

//Para registrar un nuevo usuario
Route::post('/signup}', [UserController::class, "crear_usuario"])->name('signup.register');

//! No funciona, tiene que explicarlo Olga
Route::post('/login', [LogInController::class, 'authenticate'])->name('verify');