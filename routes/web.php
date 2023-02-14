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

//Llamamos al middleware de isAdmin (configurado en kernel.php y adminMiddleware) para asegurarnos que solo los admin acceden al dashboard
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get(
        '/',
        function () {
            return view('admin');
        }
    );
    Route::prefix('/products')->group(
        function () {
            Route::get('/', [ProductController::class, 'mostrar_productos'])->name('admin.products');
            Route::get('/edit/{id}', [ProductController::class, 'editar_producto'])->name('products.edit');
            Route::put('/update/{id}', [ProductController::class, 'actualizar_producto'])->name('products.update');
            Route::get('/create', [ProductController::class, 'crear_producto'])->name('products.create');
            Route::post('/insert', [ProductController::class, 'insertar_producto'])->name('products.insert');
            Route::delete('delete/{id}', [ProductController::class, 'eliminar_producto'])->name('products.delete');
        }
    );
    Route::prefix('/users')->group(
        function () {
            Route::get('/', [UserController::class, 'mostrar_usuarios'])->name('admin.users');
            Route::get('/edit/{id}', [UserController::class, 'editar_usuario'])->name('users.edit');
            Route::put('/update/{id}', [UserController::class, 'actualizar_usuario'])->name('users.update');
            Route::get('/create', [UserController::class, 'crear_usuario'])->name('users.create');
            Route::post('/insert', [UserController::class, 'insertar_usuario'])->name('users.insert');
            Route::delete('delete/{id}', [UserController::class, 'eliminar_usuario'])->name('users.delete');
        }
    );
});

Route::get('/user', [UserController::class, "mostrar_usuario"])->name('user')->middleware('auth');


Route::get('/shoppingCart', function () {
    return view('/shoppingCart');
})->name('shoppingCart');

//Para cargar las categorías usamos una sola vista. El controlador carga los datos de la seleccionada por url

Route::get('/category/{id?}', [CategoryController::class, "category"])->name('category');