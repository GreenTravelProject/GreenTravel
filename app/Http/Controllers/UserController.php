<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function crear_usuario(Request $request){

        $request->validate([
            'name' => 'required|min:4|max:255',
            'surname' => 'required|min:4|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|numeric|max:9|min:9',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|max:255',
            'genre' => Rule::in(['F','M','O']),
        ]);

        $crearUsuario = new User;

        $crearUsuario->name = $request->name;
        $crearUsuario->sername = $request->surname;
        $crearUsuario->birth_date = $request->birth_date;
        $crearUsuario->phone = $request->phone;
        $crearUsuario->email = $request->email;
        $crearUsuario->password = $request->password;
        $crearUsuario->genre = $request->genre;

        $crearUsuario->save();

        return back()->with('mensaje', 'Usuario ha sido creado exitosamente');
    }

    public function mostrar_usuario(){
        $usuario = User::findOrFail(Auth::id()); //Recoge el usuario mediante el ID del usuario con sesión
        return view('user', @compact('datos'));
    }

    public function mostrar_todos(){
        $usuario = User::findOrFail(Auth::id());
        if($usuario->admin === 1){ //Comprueba que el usuario tenga permiso de administrador
            $notas = User::paginate(5);
            return view('admin', @compact('usuarios'));
        }
    }

    public function eliminar_usuario($id){
        //todo Solo lo podrá hacer el admin, el usuario solo deshabilitara la cuenta
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return back()->with('mensaje', 'El usuario ha sido eliminado.');
    }


}
