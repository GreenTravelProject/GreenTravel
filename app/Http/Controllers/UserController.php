<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Shopping_cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Fortify;

class UserController extends Controller
{
    //! Lo realiza Fortify
    // public function crear_usuario(Request $request){

    //     $request->validate([
    //         'name' => 'required|alpha|min:3|max:255',
    //         'surname' => 'required|alpha|min:3|max:255',
    //         'birth_date' => 'required|date',
    //         'phone' => 'required|numeric|digits:9',
    //         'email' => 'required|email|unique:users,email|max:255',
    //         'password' => 'required|min:8|max:255|same:password_verify',
    //         'genre' => Rule::in(['F','M','O']),
    //     ]);

    //     $crearUsuario = new User;

    //     $crearUsuario->name = $request->name;
    //     $crearUsuario->surname = $request->surname;
    //     $crearUsuario->phone = $request->phone;
    //     $crearUsuario->birth_date = $request->birth_date;
    //     $crearUsuario->genre = $request->genre ?? 'O';
    //     $crearUsuario->admin = 0;
    //     $crearUsuario->email = $request->email;
    //     $crearUsuario->password = $request->password;

    //     $crearUsuario->save();


    //* Lo realiza un trigger en la bbdd
    //     //Crear carrito en el momento de crear el usuario
    //     $crearCarrito = new Shopping_cart;
    //     $crearCarrito->user_id = $crearUsuario->id;
    //     $crearCarrito->save();

    //     //Crear favorito en el momento de crear el usuario
    //* Lo realiza un trigger en la bbdd
    //     $crearFavorito = new Favorite;
    //     $crearFavorito->user_id = $crearUsuario->id;
    //     $crearFavorito->save();

    //     return back()->with('mensaje', 'El suario ha sido creado exitosamente');

    // }

    public function mostrar_usuario()
    {
        $usuario = User::findOrFail(Auth::id()); //Recoge el usuario mediante el ID del usuario con sesión
        return view('user', @compact('usuario'));
    }

    public function mostrar_usuarios()
    {
        $users = User::all();
        $users = User::paginate(10);
        return view('users.adminUsers', @compact('users'));
    }

    public function editar_usuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('users.edit', @compact('usuario'));
    }

    /*
    public function mostrar_usuarios()
    {
    //$usuario = User::findOrFail(Auth::id());
    //if ($usuario->admin === 1) { //Comprueba que el usuario tenga permiso de administrador
    $usuarios = User::all();
    $usuarios = User::paginate(5);
    return view('users.adminUsers', @compact('usuarios'));
    //}
    }*/

    public function actualizar_usuario(Request $request, $user_ID)
    {
        $request->validate([
            'name' => 'required|alpha|min:4|max:255',
            'surname' => 'required|regex:/^[\pL\s\-]+$/u|min:4|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|integer|min:8',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|max:255',
            'genre' => Rule::in(['F', 'M', 'O']),
        ]);

        $usuario = User::findOrFail($user_ID);
        $usuario->name = $request->name;
        $usuario->surname = $request->surname;
        $usuario->phone = $request->phone;
        $usuario->birth_date = $request->birth_date;
        $usuario->genre = $request->genre ?? 'O';
        if ($request->admin == null) {
            $usuario->admin = 0;
        } else {
            $usuario->admin = 1;
        }
        //TODO: hay un problema con email unique: si se deja el mismo que tenía antes, peta
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();

        return back()->with('mensaje', 'Los datos han sido modificados.');
    }

    public function eliminar_usuario($user_ID)
    {

        $user = User::findOrFail(Auth::id());

        if ($user->admin === 1) { // Borra la cuenta (ADMIN)
            $usuario = User::findOrFail($user_ID);
            $usuario->delete();
        } else { //Deshabilita la cuenta (Usuario)
            $user->state = 0;
            $user->save();
        }

        return back()->with('mensaje', 'El usuario ha sido eliminado.');
    }

}