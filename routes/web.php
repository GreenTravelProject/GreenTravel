<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [CategoryController::class, 'categorias_index'])->name('index');

Route::get('/category', function () {
    return view('category');
});

Route::get('/admin', [ProductController::class, 'mostrar_productos']);
Route::get('/edit/{id}', [ProductController::class, 'editar_producto'])->name('products.edit');
Route::put('/update/{id}', [ProductController::class, 'actualizar_producto'])->name('products.update');
Route::get('/create', [ProductController::class, 'crear_producto'])->name('products.create');
Route::post('/insert', [ProductController::class, 'insertar_producto'])->name('products.insert');
Route::delete('delete/{id}', [ProductController::class, 'eliminar_producto'])->name('products.delete');


Route::get('/user', [UserController::class, "mostrar_usuario"])->name('user')->middleware('auth');


Route::get('/shoppingCart', function () {
    return view('/shoppingCart');
})->name('shoppingCart');

//Para cargar las categorías usamos una sola vista. El controlador carga los datos de la seleccionada por url

Route::get('/category/{id?}', [CategoryController::class, "category"])->name('category');
