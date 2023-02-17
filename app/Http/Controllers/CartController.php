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
        return view('shoppingCart', @compact("cart"));
    }

    //TODO:
    public function add(Request $request)
    {
        $product = $request->product;
        $cart = Cart::where('user_id', Auth::id())->first();
        //TODO: Controlar que exista el producto para añadirlo al carrito: (amount, status)

        //TODO: no me coge el stock: 
        if ($request->product->stock > $product->pivot->amount) {
            $cart->products()->attach($product->id, ['amount' => $product->pivot->amount, 'status' => '1']);
            return back()->with('mensaje', 'el producto ha sido añadido al carrito');
        } else {
            return back()->with('mensaje', "No hay stock disponible");
        }
    }


    public function delete_product($product)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->products()->where('product_id', $product)->detach($product);


        return back();
    }
}