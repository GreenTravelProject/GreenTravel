<?php

namespace App\Http\Controllers;

use App\Models\Shopping_cart;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    // Mostrar los productos que actualmente se encuentra en el carrito.
    // ? Podríamos hacerlo así, si se selecciona un producto se añade a la bbdd (Aunque no se confirme la compra)
    // ? Cuando se confirme se vuelcan los datos en la tabla pedido y se borran del carrito.
    public function show_cart(){
        $shopping_cart = Shopping_cart::where('user_id', Auth::id());

        $products = $shopping_cart->products;

        return view('shopping_cart', @compact("shopping_cart", "products"));
    }
}
