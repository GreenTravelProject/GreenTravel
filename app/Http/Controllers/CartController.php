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
    public function show_cart()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $products = $cart->products;
        return view('shoppingCart', @compact("products"));
    }

    //TODO:
    public function add(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->products()->attach($request->product);
        return back()->with('mensaje', 'el producto ha sido añadido al carrito');
    }
}