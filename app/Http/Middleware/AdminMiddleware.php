<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        //Comprueba que esté logado antes de mostrar el dashboard
        if (Auth::check()) {
            //Comprueba que el usuario logado es admin: 
            if (Auth::User()->admin == '1') {
                return $next($request);
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }

}