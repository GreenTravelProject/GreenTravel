@extends('template.templateUser')
@section('user')
    <div class="container">
        <h1>DATOS PERSONALES</h1>
        <div class="container p-4">
            <form action="{{ route('user-profile-information.update') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row m-3">
                    <div class="col-md-6 col-sm-12">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="name" placeholder="Mínimo 3 caracteres"
                            value="{{ $usuario->name }}" required><br>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label>Apellidos</label>
                        <input class="form-control" type="text" name="surname" placeholder="Mínimo 3 caracteres"
                            value="{{ $usuario->surname }}" required><br>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label>Número de teléfono</label>
                        <input class="form-control" type="tel" name="phone" placeholder="*"
                            value="{{ $usuario->phone }}" required><br>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label>Género</label>
                        <select class="form-control" type="text" name="genre"value="{{ $usuario->genre }}">
                            <option disabled>-</option>
                            <option @if ($usuario->genre == 'M') selected @endif value="M">Masculino</option>
                            <option @if ($usuario->genre == 'F') selected @endif value="F">Femenino</option>
                            <option @if ($usuario->genre == 'O') selected @endif value="O">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label id="nacimiento">Correo electrónico</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input class="form-control" type="email" name="email" placeholder="*"
                                value="{{ $usuario->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label id="nacimiento">Fecha de nacimiento*</label>
                        <input class="form-control" type="date" name="birth_date" required
                            value="{{ $usuario->birth_date }}"><br>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button id="btn-signup" class="bg-success btn mb-5 text-light text-center"
                        type="submit">Cambiar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
