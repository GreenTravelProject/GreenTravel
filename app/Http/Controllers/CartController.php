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
        $product = Product::findOrFail($request->product);
        $cart = Cart::where('user_id', Auth::id())->first();

        //TODO: Controlar que exista el producto para añadirlo al carrito: (amount, status)
        if ($cart->products->contains($product->id)) {

            $cart->products()::where('product_id', $product->id)->increment('amount');
            return back()->with('mensaje', 'Ya existe el producto en el carrito. Se ha añadido otra unidad');
        } else {
            if ($product->stock >= 1) {
                $cart->products()->attach($product->id, ['amount' => '1', 'status' => '1']);
                return back()->with('mensaje', 'El producto ha sido añadido al carrito');
            } else {
                return back()->with('mensaje', "No hay stock disponible");
            }
        }
    }

    //Subir o bajar la cantidad del producto en el carrito: 
    public function change_amount($id, $type)
    {
        $product = Product::findOrFail($id);
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($type == "increment") {
            //Increment/decrement suma/resta uno a amount (del producto seleccionado)
            //TODO: preguntar xq get no va. Pluck devuelve un array con todos los valores de la clave dada
            if ($cart->products()->where('product_id', $id)->pluck('amount')[0] + 1 > $product->stock) {
                return back()->with('error', 'No hay suficiente stock');
            } else {
                $cart->products()->where('product_id', $id)->$type('amount');
                return back();
            }
        }
        $cart->products()->where('product_id', $id)->$type('amount');
        return back();


    }

    public function delete_product($product)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->products()->where('product_id', $product)->detach($product);

        return back();
    }
}