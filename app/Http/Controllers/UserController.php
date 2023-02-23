<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Adress;
use App\Models\Shopping_cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Fortify;

class UserController extends Controller
{

    public function mostrar_usuario()
    {
        $usuario = User::findOrFail(Auth::id()); //Recoge el usuario mediante el ID del usuario con sesión
        return view('userpanel.datosPersonales', @compact('usuario'));
    }

    public function mostrar_usuarios()
    {
        $users = User::all();
        $users = User::paginate(10);
        return view('admin.users.adminUsers', @compact('users'));
    }

    public function editar_usuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.users.edit', @compact('usuario'));
    }

    public function actualizar_usuario(Request $request, $user_ID)
    {
        //TODO: ESTO DEBERÍA HACERLO FORTIFY???
        $usuario = User::findOrFail($user_ID);

        if ($usuario->email == $request->email) {

            $request->validate([
                'name' => 'required|alpha|min:4|max:255',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|min:4|max:255',
                'birth_date' => 'required|date',
                'phone' => 'required|integer|min:8',
                'password' => 'required|min:8|max:255',
                'genre' => Rule::in(['F', 'M', 'O']),
            ]);

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

            $usuario->password = $request->password;

            return back()->with('mensaje', 'Los datos han sido modificados.');

        } else {

            $request->validate([
                'name' => 'required|alpha|min:4|max:255',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|min:4|max:255',
                'birth_date' => 'required|date',
                'phone' => 'required|integer|min:8',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|min:8|max:255',
                'genre' => Rule::in(['F', 'M', 'O']),
            ]);

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

            $usuario->email = $request->email;
            $usuario->password = $request->password;

            return back()->with('mensaje', 'Los datos han sido modificados.');
        }
    }

    public function eliminar_usuario($user_ID)
    {

        $user = User::findOrFail(Auth::id());

        if ($user->admin === 1) { // Borra la cuenta (ADMIN)
            $usuario = User::findOrFail($user_ID);
            // $usuario->adress->delete();
            // $usuario->cart->delete();
            // $usuario->favorite->delete();
            $usuario->delete();
        } else { //Deshabilita la cuenta (Usuario)
            $user->state = 0;
            $user->save();
        }

        return back()->with('mensaje', 'El usuario ha sido eliminado.');
    }

}