<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function category(int $categoryId)
    {
        //Guardamos la categoría seleccionada por ID 
        $category = Category::findOrFail($categoryId);
        $categories = Category::all();

        //Pasamos las categorías para que las tenga el footer: 
        $categories = Category::all();

        //Buscamos los productos de la categoría. Por parámetro le pasamos la categoría y el nº de productos por pantalla(paginar)
        $products = $category->products;

        //Devolvemos a la vista los datos de la categoría seleccionada
        return view('category', @compact("category", "products", "categories"));
    }

    public function categorias_index()
    {
        $categories = Category::all();
        return view('index', @compact("categories"));
    }

    public function categorias_footer()
    {
        $categories = Category::all();
        return view('template.general', @compact("categories"));
    }

    public function categorias_footer2()
    {
        $categories = Category::all();
        return view('template.general2', @compact("categories"));
    }
}