<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function show_favorites()
    {
        $favorite = Favorite::where('user_id', Auth::id())->first();
        $products = $favorite->products;
        return view('', @compact("products"));
    }
    // TODO: Termina consulta en tabla pivote favorite_product
    public function add(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())->first();
        // $favorite->products->where('product_id', $request)->exists();

        if(DB::table('favorite_product')->where('product_id', $request->product && 'favorite_id', $favorite->id)->doesntExist()){
            $favorite->products()->attach($request->product);
            return back()->with('mensaje', 'El producto se ha añadido a favoritos');

        }if(DB::table('favorite_product')->where('product_id', $request->product && 'favorite_id', $favorite->id)->exists()){
            $favorite->products()->detach($request->product);
            return back()->with('mensaje', 'El producto se ha eliminado de favoritos');
        }
    }

}
