@extends('template.general')

@section('user')
    <section id="user-cont">
        <div class="row m-0 w-100" id="full-page">
            <div class="col-md-2 col-sm-2 p-0 bg-light">
                <div class="profile-sidebar">
                    <div class="profile-user">
                        <div class="profile-name text-center">
                            <h1 class="p-4">MENÚ</h1>
                            <hr class="m-0">
                        </div>
                    </div>
                    <div class="profile-menu mt-0">
                        <h4 class="p-4" onclick="reveal('user-info1');">Cuenta</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info2');">Favoritos</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info3');">Cambio contraseña</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info4');">Dirección</h4>
                        <hr class="m-0">
                        <a class="text-decoration-none text-black" href="{{ route('cart') }}">
                            <h4 class="p-4">Carrito</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div id="user-data" class="col-md-10 col-sm-2 pb-0">
                <span class="user-info" id="user-info1">
                    <div class="container">
                        <h1>DATOS PERSONALES</h1>
                        <div class="container p-4">
                            <form method="post">
                                @csrf
                                <div class="row m-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Nombre</label><input class="form-control" type="text" name="name"
                                            placeholder="Mínimo 3 caracteres" value="{{ $usuario->name }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Apellidos</label><input class="form-control" type="text" name="surname"
                                            placeholder="Mínimo 3 caracteres" value="{{ $usuario->surname }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Número de teléfono</label><input class="form-control" type="tel"
                                            name="phone" placeholder="*" value="{{ $usuario->phone }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Género</label><select class="form-control" type="text" name="genre"
                                            value="{{ $usuario->genre }}">
                                            <option disabled>-</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="O">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Correo electrónico</label>
                                        <div class="input-group">
                                            <div class="input-group-text">@</div><input class="form-control" type="email"
                                                name="email" placeholder="*" value="{{ $usuario->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Fecha de nacimiento*</label><input class="form-control"
                                            type="date" name="birth_date" required
                                            value="{{ $usuario->birth_date }}"><br>
                                    </div>
                                </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button id="btn-signup" class="bg-success btn mb-5 text-light text-center"
                                type="submit">Cambiar</button>
                        </div>
                        </form>
                    </div>
                </span>
                <span class="user-info" id="user-info2">
                    <div class="container">
                        <h1>PRODUCTOS FAVORITOS</h1>
                        <div class="container p-4">
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="img-fluid"
                                        src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                    <div class="card-body">
                                        <h4 class="card-title">Special title treatment</h4>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
                <span class="user-info" id="user-info3">
                    <div class="container">
                        <h1>CAMBIAR</h1>
                        <div class="container p-4">
                            <form method="post">
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
                </span>
                <span class="user-info" id="user-info4">
                    <div class="container">
                        <h1>DIRECCIÓN</h1>
                        <div class="container p-4">
                            <form method="post">
                                @csrf
                                <div class="row m-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label>País</label><select class="form-control" type="text" name="country"
                                            required><br>
                                            <?php
                                                $countries = [' * ', 'Alemania', 'Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaiyán', 'Bélgica', 'Bielorrusia',
                                                    'Bosnia y Herzegovina', 'Bulgaria', 'Chipre', 'Croacia', 'Dinamarca', 'Eslovaquia', 'Eslovenia', 'España', 'Estonia', 'Finlandia', 'Francia', 'Georgia', 'Grecia',
                                                    'Hungría', 'Irlanda', 'Islandia', 'Italia', 'Kosovo', 'Letonia', 'Liechtenstein', 'Lituania', 'Luxemburgo', 'Macedonia', 'Malta', 'Moldavia',
                                                    'Mónaco', 'Montenegro', 'Noruega', 'Países Bajos', 'Polonia', 'Portugal', 'Reino Unido', 'República Checa', 'Rumanía', 'Rusia',
                                                    'San Marino', 'Suecia', 'Suiza', 'Turquía', 'Ucrania', 'Serbia'];

                                                foreach ($countries as $value) {
                                                    if($value == ' - '){
                                                        echo("<option value='.$value.' selected='selected' disabled>".$value.'</option>');
                                                    }else{
                                                        echo('<option value='.$value.'>'.$value.'</option>');
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Localidad</label><input class="form-control"
                                            type="text" name="city" placeholder="*" required><br>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label>Calle</label><input class="form-control" type="text"
                                            name="street" placeholder="Dirección exacta" value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label>Número</label><input class="form-control" type="text"
                                            name="number" placeholder="*" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label>Bloque</label><input class="form-control" type="text"
                                            name="block" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label>Planta</label><input class="form-control" type="text"
                                            name="floor" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label>Puerta</label><input class="form-control" type="text"
                                            name="door" value="{{ old('email') }}">
                                    </div><br>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button id="btn-signup" class="bg-success btn mb-2 text-light text-center mt-3"
                                        type="submit">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        </div>
    </section>
@endsection
