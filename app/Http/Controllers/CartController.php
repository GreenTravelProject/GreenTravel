<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
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
        $product = Product::findOrFail($request->product);
        $cart = Cart::where('user_id', Auth::id())->first();

        if (isset($cart->products)) {
            //TODO: Controlar que exista el producto para añadirlo al carrito: (amount, status)
            if ($cart->products->contains($product->id)) {
                if ($cart->products()->where('product_id', $product->id)->pluck('amount')[0] + 1 > $product->stock) {
                    toastr('No hay stock en este momento', "error", 'Ooops');
                    return back();
                } else {
                    $cart->products()->where('product_id', $product->id)->increment('amount');
                    $cart->total += $product->price;
                    $cart->save();
                    toastr('Ya existe ese artículo en el carrito. Se ha añadido otra unidad', "success", '¡Perfecto!');
                    return back();
                }
            }
        }

        if ($product->stock >= 1) {
            //TODO: status??
            $cart->products()->attach($product->id, ['amount' => '1', 'status' => '1']);
            $cart->total += $product->price;
            $cart->save();
            toastr('El producto ha sido añadido al carrito', "success", '¡Perfecto!');
            return back();

        } else {
            toastr('No hay stock en este momento', "error", 'Ooops');
            return back();
        }

    }

    //Subir o bajar la cantidad del producto en el carrito: 
    public function plus_amount($id)
    {
        $product = Product::findOrFail($id);
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart->products()->where('product_id', $id)->pluck('amount')[0] + 1 > $product->stock) {
            toastr('No hay stock en este momento', "error", 'Ooops');
            return back();
        } else {
            $cart->products()->where('product_id', $id)->increment('amount');
            $cart->total += $product->price;
            $cart->save();
            return back();
        }
    }

    public function minus_amount($id)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $product = Product::findOrFail($id);

        if ($cart->products()->where('product_id', $id)->pluck('amount')[0] == 1) {
            $cart->total -= $product->price;
            $cart->save();
            $cart->products()->detach($id);
            return back();
        } else {
            $cart->products()->where('product_id', $id)->decrement('amount');
            $cart->total -= $product->price;
            $cart->save();
            return back();
        }
    }

    public function delete_product($id)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $product = Product::findOrFail($id);
        $cart->total -= ($product->price * $cart->products()->where('product_id', $id)->pluck('amount')[0]);
        $cart->products()->detach($id);
        $cart->save();
        return back();
    }
}