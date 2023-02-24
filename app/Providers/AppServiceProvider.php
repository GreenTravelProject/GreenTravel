<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
        //TODO: DOCUMENTACIÓN. controlar que las categorías de la base de datos existen: (necesitamos un seeder con las categorías)

        // // Artisan::call('migrate');
        // // Artisan::call('db:seed');
 
        view()->share('categories', Category::all());
   
    }
}
