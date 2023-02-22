@extends('template.templateUser')
@section('cambioPassword')
<div class="container">
    <h1>CAMBIAR</h1>
    <div class="container p-4">
        <form action={{ route('user-password.update')}} method="POST" id="pass-change">
            @method('PUT')
            @csrf
            <label id="pass-start">Contraseña actual</label>
            <input id="input-user-reppass" class="form-control" type="password" name="current_password" placeholder="*"required>

            <label class="mt-4" id="pass-start">Nueva contraseña</label>
            <input id="input-user-reppass" class="form-control" type="password" name="password" placeholder="Mínimo 8 caracteres"required>

            {{-- <label class="mt-2" id="pass-start">Repetir nueva contraseña</label>
            <input id="input-user-reppass" class="form-control" type="password" name="repeat_password" placeholder="*" required> --}}

            <div class="mt-2">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif
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
