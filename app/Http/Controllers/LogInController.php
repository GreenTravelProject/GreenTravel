<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    //! No funciona !!
    //* Tiene que explicarlo Olga
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return back()->withErrors([
                'email' => 'Usuario incorrecto.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Usuario incorrecto.',
        ])->onlyInput('email');
    }


}
