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
                    return back()->with('error', 'No hay suficiente stock');
                } else {
                    $cart->products()->where('product_id', $product->id)->increment('amount');
                    return back()->with('Ya existe ese artículo en el carrito. Se ha añadido otra unidad');
                }
            }
        }

        if ($product->stock >= 1) {
            //TODO: status??
            $cart->products()->attach($product->id, ['amount' => '1', 'status' => '1']);
            //TODO: calcular el total???? no creo que sea así: 
            // $cart->total += $product->price;
            // $cart->save();
            return back()->with('mensaje', 'El producto ha sido añadido al carrito');
        } else {
            return back()->with('mensaje', "No hay stock disponible");
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

        } else {
            //TODO: Si hay 1 unidad seleccionada y pulsa -: borramos del carrito (lanzamos un estás seguro de que quieres???)
            if ($cart->products()->where('product_id', $id)->pluck('amount')[0] == 1) {
                $cart->products()->where('product_id', $id)->detach($id);

                return back();
            } else {
                $cart->products()->where('product_id', $id)->$type('amount');
                return back();
            }
        }


    }

    public function delete_product($product)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->products()->where('product_id', $product)->detach($product);
        return back();
    }
}