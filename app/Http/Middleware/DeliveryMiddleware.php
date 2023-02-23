<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class DeliveryMiddleware
{
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            //Comprueba que haya productos en el carrito
            if (isset(Auth::user()->cart->products[0])) {
                return $next($request);
            } else {
                return redirect('/cart');
            }
        } else {
            return redirect('/cart');
        }
    }

}