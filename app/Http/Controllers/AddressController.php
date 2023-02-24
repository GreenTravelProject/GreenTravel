<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    public function mostrar_direccion()
    {

        $usuario_direccion = Adress::where('user_id', Auth::id())->first();
        return view('userPanel.direccion', @compact('usuario_direccion'));
    }
    public function cambiar_direccion(Request $request){

        Validator::make($request->all(), [
            'id' => ['required', 'numeric'],
        ])->validate();
        $errors = $request->has('errors');

        if (!$errors) {
        $usuario_direccion = Adress::where('user_id', Auth::id())->get();
        foreach ($usuario_direccion as $value) {
            if($value->id == $request->id){
                $value->status = true;
                $value->save();
            }else{
                $value->status = false;
                $value->save();
            }
        }
        toastr('Dirección configurada correctamente','success','¡Nueva dirección!');

        return back();
        }else {
            return back()->with($errors);

        }
    }

    public function crear_direccion(Request $request)
    {

        $arrayPaises = array(
            'Alemania', 'Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaiyán', 'Bélgica', 'Bielorrusia',
            'Bosnia y Herzegovina', 'Bulgaria', 'Chipre', 'Croacia', 'Dinamarca', 'Eslovaquia', 'Eslovenia', 'España', 'Estonia', 'Finlandia', 'Francia', 'Georgia', 'Grecia',
            'Hungría', 'Irlanda', 'Islandia', 'Italia', 'Kosovo', 'Letonia', 'Liechtenstein', 'Lituania', 'Luxemburgo', 'Macedonia', 'Malta', 'Moldavia',
            'Mónaco', 'Montenegro', 'Noruega', 'Países Bajos', 'Polonia', 'Portugal', 'Reino Unido', 'República Checa', 'Rumanía', 'Rusia',
            'San Marino', 'Suecia', 'Suiza', 'Turquía', 'Ucrania', 'Serbia'
        );


        Validator::make($request->all(), [
            'country' => ['required', Rule::in($arrayPaises)],
            'city' => ['required', 'min:2', 'max:255'],
            'street' => ['required', 'min:3','max:255'],
            'number' => ['required', 'min:1', 'numeric'],
            'building' => ['nullable'],
            'floor' => ['nullable', 'numeric'],
            'door' => ['nullable', 'max:255'],

        ])->validate();
        $errors = $request->has('errors');

        if (!$errors) {

            $usuario_direccion = New Adress;
            $usuario_direccion->country = $request['country'];
            $usuario_direccion->city = $request['city'];
            $usuario_direccion->street = $request['street'];
            $usuario_direccion->number = $request['number'];
            $usuario_direccion->building = $request['building'];
            $usuario_direccion->floor = $request['floor'];
            $usuario_direccion->door = $request['door'];
            $usuario_direccion->status = false;
            $usuario_direccion->user_id = Auth::id();
            $usuario_direccion->save();

            toastr("Dirección actualizada", 'success', '¡Completado!');
        return back();
        }else {
            return back()->with($errors);

        }

    }
}
