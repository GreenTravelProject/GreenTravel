@extends('template.general2')
@section('login')
    <div id="login">
        <form method="post" action="{{route('verify')}}" class="text-center">
            <h1>INICIAR SESIÓN</h1><br>
            @error('email')

            @enderror
            <h1><i class="bi bi-person-circle fs-1"></i></h1>
            <input class="form-control" type="text" name="name" placeholder="Email o user" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>
            <input class="form-control" type="password" name="password" placeholder="Contraseña" required><br>
            <button class="bg-success btn w-50 text-light" type="submit">Iniciar sesión</button>
        </form>
    </div>
    <p id="p-login" class="text-center">Si no estás registrado pulsa <a href="{{ route('signup') }}">aquí</a></p>
@endsection
