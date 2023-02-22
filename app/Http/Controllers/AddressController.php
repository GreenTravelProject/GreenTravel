<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function mostrar_direccion()
    {

        $usuario_direccion = User::findOrFail(Auth::id());
        $user_adress = Adress::all();
        return view('user/direccion', @compact('user_adress'));
    }

    public function actualizar_direccion(Request $request)
    {

        $arrayPaises = array(
            "Alemania","Albania","Andorra","Armenia","Austria","Bélgica","Bielorrusia","Bosnia y Herzegovina","Bulgaria",
            "Chipre","Croacia","Dinamarca","Eslovaquia","Eslovenia","España","Estonia","Finlandia","Francia","Georgia","Grecia",
            "Hungría","Irlanda","Islandia","Italia",",Letonia","Liechtenstein","Lituania","Luxemburgo","Malta","Moldavia","Mónaco",
            "Montenegro","Noruega","Países Bajos","Polonia","Portugal","Reino Unido","República Checa"," Macedonia","Rumanía","Rusia",
            "Serbia","Suecia","Suiza","Ucrania"
        );
        $usuario_direccion = Adress::where('user_id', Auth::id())->first();

        if ($usuario_direccion->id == $request->id) {
            $request->validate([
                'country' => 'required|arrayPaises',
                'city' => 'required|min:2|max:40',
                'street' => 'required|min:3|max:100',
                'number' => 'required|min:3|max:100',
                'block' => 'nullable',
                'floor' => 'nullable',
                'door' => 'nullable'
            ]);

            $usuario_direccion->country = $request->country;
            $usuario_direccion->city = $request->city;
            $usuario_direccion->street = $request->street;
            $usuario_direccion->number = $request->number;
            $usuario_direccion->block = $request->block;
            $usuario_direccion->floor = $request->floor;
            $usuario_direccion->door = $request->door;
            
            Adress::where('user_id', $usuario_direccion->id)->update($usuario_direccion);
            return back()->with('mensaje', "Dirección actualizada");
        } else {
            $request->validate([
                'country' => 'required|arrayPaises',
                'city' => 'required|min:2|max:40',
                'street' => 'required|min:3|max:100',
                'number' => 'required|min:3|max:100',
                'block' => 'nullable',
                'floor' => 'nullable',
                'door' => 'nullable'
            ]);

            $usuario_direccion->country = $request->country;
            $usuario_direccion->city = $request->city;
            $usuario_direccion->street = $request->street;
            $usuario_direccion->number = $request->number;
            $usuario_direccion->block = $request->block;
            $usuario_direccion->floor = $request->floor;
            $usuario_direccion->door = $request->door;

            return back()->with('mensaje', "Dirección actualizada");
        }
    }
}
