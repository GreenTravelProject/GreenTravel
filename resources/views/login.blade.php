@extends('template.general2')
@section('login')
    <div id="login">
        <form action="post" class="text-center">
            <h1><i class="bi bi-person-circle fs-1"></i></h1>
            <input class="form-control" type="text" name="name" placeholder="Email o user" required><br>
            <input class="form-control" type="password" name="password" placeholder="Contraseña" required><br>
            <input class="bg-success btn" type="submit">
        </form>
    </div>
@endsection
