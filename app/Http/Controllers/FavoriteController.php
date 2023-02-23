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
        $favorites = $favorite->products;
        return view('userpanel.favoritos', @compact('favorites'));
    }
    public function add(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())->first();

        if (DB::table('favorite_product')->where('product_id', $request->product)->where('favorite_id', $favorite->id)->doesntExist()) {
            $favorite->products()->attach($request->product);
            toastr('Se ha añadido a favoritos', "success", '¡Listo!');
            return back();

        }
        if (DB::table('favorite_product')->where('product_id', $request->product)->where('favorite_id', $favorite->id)->exists()) {
            $favorite->products()->detach($request->product);
            toastr('Se ha eliminado de favoritos', "success", '¡Listo!');
            return back();
        }
    }

}