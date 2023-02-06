<?php

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


Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/user', function () {
    return view('user');
});

Route::get('/shoppingCart', function () {
    return view('/shoppingCart');
})->name('shoppingCart');
