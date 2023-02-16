<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    // Mostrar los productos que actualmente se encuentra en el carrito.
    public function show_cart(){
        $shopping_cart = Cart::where('user_id', Auth::id());

        $products = $shopping_cart->products;

        return view('shopping_cart', @compact("shopping_cart", "products"));
    }

    //TODO:
    public function add(Request $request){
        $cart = Cart::where('user_id', Auth::id())->first();
        $categories = Category::all();
        $cart->products()->attach($request->product);
        $products = $cart->products;
        return view('shoppingCart',@compact('products','categories'));
    }
}
