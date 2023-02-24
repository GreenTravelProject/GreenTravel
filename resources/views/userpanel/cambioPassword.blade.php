@extends('template.templateUser')
@section('cambioPassword')
<div class="container">
    <h1 class="mt-3">CAMBIAR</h1>
    <div class="container p-4">
        <form action={{ route('user-password.update')}} method="POST" id="pass-change">
            @method('PUT')
            @csrf
            <label id="pass-start" for="current_password">{{ __('Actual contraseña') }}</label>
            <input id="input-user-reppass" class="form-control" type="password" name="current_password" placeholder="*" required>

            <label class="mt-4" id="pass-start" for="password">{{ __('Nueva contraseña') }}</label>
            <input id="input-user-reppass" class="form-control" type="password" name="password" placeholder="Mínimo 8 caracteres" required>

            <label class="mt-4" id="nacimiento" for="password-confirm">{{ __('Confirmar contraseña') }}</label>
            <input id="input-user-reppass" type="password" class="form-control" name="password_confirmation" required">

            <div class="mt-2">

            @if ($errors->updatePassword->any())
                <div class="alert alert-danger">
                    @foreach($errors->updatePassword->all() as $error)
                        <li class="p-2">{{$error}}</li>
                    @endforeach
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
