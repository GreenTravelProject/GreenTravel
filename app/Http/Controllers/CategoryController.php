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


    public function categories( int $categoryId)
    {
        $category = Category::findOrFail($categoryId);//1=Deportes
        $products = Product::findByCategory($categoryId, 5);
        return view('category', @compact("category"));

    }

    public function categorias()
    {
        $category = Category::all();
        return view('category', @compact("category"));

    }
}