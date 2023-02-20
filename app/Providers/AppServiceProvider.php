<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // TODO: PREGUNTAR A OLGA SI ESTO ESTÁ BIEN 
       view()->share('categories', Category::all()); 
        //TODO: DOCUMENTACIÓN. controlar que las categorías de la base de datos existen:
        view()->share('categories', Category::all());
    }
}