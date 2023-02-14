<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping_cart;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    // Mostrar los productos que actualmente se encuentra en el carrito.
    public function show_cart(){
        $shopping_cart = Shopping_cart::where('user_id', Auth::id());

        $products = $shopping_cart->products;

        return view('shopping_cart', @compact("shopping_cart", "products"));
    }

    public function add($product_id){
        $product = Product::where('id', $product_id);
        //TODO:
        return $product;
    }
}
