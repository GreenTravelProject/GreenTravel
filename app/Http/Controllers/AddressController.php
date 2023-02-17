<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AddressController extends Controller
{
 
    public function mostrar_direccion(){

        $usuario_direccion = User::findOrFail(Auth::id());
        $user_adress = Adress::all();
        return view('user', @compact('$user_adress'));
    }

public function actualizar_direccion(Request $request, $address_ID){

        $arrayPaises = array("DE", "AD", "AM", "AT", "BE", "BY", "BA", "BG", "CY", "HR",  "DK", "SI", "ES", "EE", "FI",
         "FR", "GE", "GI", "GR", "HU", "IE", "IS", "FO", "IT", "LV", "LI", "LT", "LU", "MK", "MT",  "MD",  "MC",  "NO",
         "NL", "PL", "PT", "UK", "CZ",  "SK", "RO","RU", "SM", "SE", "CH", "UA");
        $usuario_direccion = Adress::where('user_id', Auth::id())->first();

        if($usuario_direccion->id == $request->id){
            $request->validate([
                'country' => 'required|arrayPaises',
                'city' => 'required|min:2|max:40',
                'street' => 'required|min:3|max:100'
            ]);

            $usuario_direccion -> country = $request -> country;
            $usuario_direccion -> city = $request -> city;
            $usuario_direccion -> street = $request -> street;

            Adress::where('user_id', $usuario_direccion->id)-> update($usuario_direccion);
            return back()->with('mensaje', "Dirección actualizada");

        }else{
            $request->validate([
                'country' => 'required|arrayPaises',
                'city' => 'required|min:2|max:40',
                'street' => 'required|min:3|max:100'
            ]);

            $usuario_direccion -> country = $request -> country;
            $usuario_direccion -> city = $request -> city;
            $usuario_direccion -> street = $request -> street;

            return back()->with('mensaje', "Dirección actualizada");
        }
    }
}