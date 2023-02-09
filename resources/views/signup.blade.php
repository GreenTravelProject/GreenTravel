@extends('template.general2')
@section('login')
    <div class="container">
        <form method="post" action="{{route('signup.register')}}">
            @csrf
            <div class="mt-2">
            @error('nombre')
                <div class="alert alert-danger">
                    El formato del nombre no es válido
                </div>
            @enderror
            @error('surname')
                <div class="alert alert-danger">
                    El formato del apellido no es válido
                </div>
            @enderror
            @error('phone')
                <div class="alert alert-danger">
                    El teléfono no cumple con el formato requerido
                </div>
            @enderror
            @error('birth_day')
                <div class="alert alert-danger">
                    La fecha introducida no es válida
                </div>
            @enderror
            @error('genre')
                <div class="alert alert-danger">
                    Debes seleccionar un género
                </div>
            @enderror
            @error('email')
                <div class="alert alert-danger">
                    La dirección de correo no es válida
                </div>
            @enderror
            @error('password')
                <div class="alert alert-danger">
                    Las contraseñas no son iguales
                </div>
            @enderror
            @if (session('mensaje'))
                <div class="alert alert-success">{{ session('mensaje') }}</div>
            @endif
            </div>
            <h1 class="text-center mt-5">CREA TU CUENTA</h1>
            <p class="text-center">Regístrate en Green Travel para disfrutar de todas las experiencias que ofrecemos.<br>Si ya estas registrado pulsa <a href="{{ route('login') }}">aquí</a></p>
            <div class="row m-3">
                <div class="col-md-6 col-sm-12">
                    <label>Nombre</label><input class="form-control" type="text" name="name" placeholder="Mínimo 3 caracteres" value="{{old('name')}}" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Apellidos</label><input class="form-control" type="text" name="surname" placeholder="Mínimo 3 caracteres" value="{{old('surname')}}" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Número de teléfono</label><input class="form-control" type="tel" name="phone" placeholder="*" value="{{old('phone')}}" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Género</label><select class="form-control" type="text" name="genre" value>
                        <option selected="selected" disabled>-</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
                <div class="col-sm-12">
                    <label id="nacimiento">Fecha de nacimiento*</label><input class="form-control" type="date" name="birth_date" required><br>
                </div>
            </div><hr class="mt-4 mb-5">
            <div class="row m-3">
                <div class="col-sm-12">
                    <label>Correo electrónico</label><div class="input-group">
                    <div class="input-group-text">@</div><input class="form-control" type="email" name="email" placeholder="*" value="{{old('email')}}" required></div><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Contraseña</label><input class="form-control" type="password" name="password" placeholder="Mínimo 8 caracteres" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Repetir contraseña</label><input class="form-control" type="password" name="password_verify" placeholder="*" required><br>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-signup" class="bg-success btn mb-5 text-light text-center" type="submit">Registrarse</button>
            </div>
        </form>
    </div>
@endsection
