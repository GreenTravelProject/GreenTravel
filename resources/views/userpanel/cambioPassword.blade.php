@extends('template.templateUser')
@section('cambioPassword')
<div class="container">
    <h1>CAMBIAR</h1>
    <div class="container p-4">
        <form method="post" id="pass-change">
            @csrf
            <label id="pass-start">Nueva contraseña</label><input id="input-user-reppass"
                class="form-control" type="password" name="password" placeholder="Mínimo 8 caracteres"
                required><br>
            <label id="pass-start">Repetir nueva contraseña</label><input id="input-user-reppass"
                class="form-control" type="password" name="password" placeholder="*" required>
            <div class="mt-2">
                @error('password')
                    <div class="alert alert-danger">
                        Las contraseñas no son iguales
                    </div>
                @enderror
                @if (session('mensaje'))
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                @endif
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-signup" class="bg-success btn mb-5 text-light text-center mt-5"
                    type="submit">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endsection