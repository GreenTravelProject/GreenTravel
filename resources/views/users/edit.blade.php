@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar los usuarios --}}

    <section class="container p-5 my-3 adminForm">
        <h2>Editando al usuario {{ $usuario->id }}</h2>
        <form action="{{ route('users.update', $usuario->id) }}" method="POST">
            @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required
                            autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Apellido: </label>
                        <input type="text" name="surname" class="form-control" value="{{ $usuario->surname }}" required
                            autofocus>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-3">
                        <label for="phone">Teléfono: </label>
                        <input id="phone" class="form-control" type="tel" name="phone"
                            value="{{ $usuario->phone }}" required autocomplete="phone" autofocus>
                    </div>
                    <div class="col-md-3">
                        <label>Género</label><select class="form-control" type="text" name="genre" value>
                            <option selected="selected" disabled>-</option>
                            <option @if ($usuario->genre == 'M') selected @endif value="M">Masculino</option>
                            <option @if ($usuario->genre == 'F') selected @endif value="F">Femenino</option>
                            <option @if ($usuario->genre == 'O') selected @endif value="O">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="birth_date">Fecha de nacimiento</label>
                        <input id="birth_date" class="form-control" type="date" name="birth_date"
                            value="{{ $usuario->birth_date }}" required autocomplete="birth_date" autofocus>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-6">
                        <label for="email">Email: </label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ $usuario->email }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Contraseña: </label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="password" autofocus value="{{ $usuario->password }}">
                    </div>
                </div>
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
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
                <button class="btn btn-success m-2" type="submit">Guardar cambios</button>
        </form>
    </section>
@endsection
