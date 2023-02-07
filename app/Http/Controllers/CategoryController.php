<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function category(int $categoryId)
    {
        //Guardamos la categoría seleccionada por ID 
        $category = Category::findOrFail($categoryId);

        //Buscamos los productos de la categoría. Por parámetro le pasamos la categoría y el nº de productos por pantalla(paginar)
        //$products = Product::findByCategory($categoryId, 5);

        //Devolvemos a la vista los datos de la categoría seleccionada
        return view('category', @compact("category"));
    }
}