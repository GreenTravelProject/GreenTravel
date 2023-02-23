<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function buy_products()
    {
        $delivery = new Delivery;
        $delivery->user_id = Auth::user()->id;
        $delivery->adress_id = Adress::where('user_id', Auth::id())->where('status', true)->first()->id; //ESTO NO SÉ, PORQUE SI TIENE + DE 1??? De momento le pongo 1 para probar
        $delivery->state = 0; //? Si el pedido se entrega será true
        $delivery->save();

        foreach (Auth::user()->cart->products as $product) {
            $delivery->products()->attach($product->id, ['amount' => $product->pivot->amount]);
            Product::findOrFail($product->id)->actualizar_stock(0); //actualizamos stock
        }
        $delivery->total = Auth::user()->cart->total;
        $delivery->save();

        Auth::user()->cart->products()->detach(); //vaciamos el carrito al hacer el pedido
        Auth::user()->cart->total = 0;
        Auth::user()->cart->save();
        return back()->with('mensaje', 'Pedido realizado :)');

    }

    public function mostrar_pedidos()
    {
        $deliveries = Delivery::all();
        $deliveries = Delivery::paginate(10);
        return view('admin.deliveries.adminDeliveries', @compact('deliveries'));
    }


    public function mostrar_mipedido()
    {
        $deliveries = Delivery::where('user_id', Auth::user()->id);
        $deliveries = Delivery::paginate(10);
        return view('userpanel.deliveries', @compact('deliveries'));

    }

    public function eliminar_pedido($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->products()->detach(); //vaciamos los productos antes de eliminar el pedido porque si no peta (la FK!!!)
        $delivery->delete();
        toastr('El pedido ha sido eliminado', "success", '¡Perfecto!');
        return back();
    }
}
