<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        if($favorite::wherePivot('product_id', $request->product)->first() === null){
            $favorite->products()->attach($request->product);
            return back()->with('mensaje', 'Producto agregado a favoritos');
        }else{
            return back()->with('mensaje', 'Este producto ya está en favoritos');
        }
    }
    public function delete(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())->first();

        if($favorite::wherePivot('product_id', $request->product)->first() === null){
            return back()->with('mensaje', 'Producto no se encuentra en favoritos');
        }else{
            $favorite->products()->detach($request->product);
            return back()->with('mensaje', 'El producto se borró de favoritos');
        }
    }
}
