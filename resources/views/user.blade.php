@extends('template.general')

@section('user')
    <section id="user-cont">
        <div class="row m-0 w-100" id="full-page">
            <div class="col-md-2 col-sm-2 p-0">
                <div class="profile-sidebar">
                    <div class="profile-user">
                        <div class="profile-name text-center">
                            <h1 class="p-4">MENÚ</h1><hr class="m-0">
                        </div>
                    </div>
                    <nav class="profile-menu mt-0">
                        <h4 class="p-4" onclick="reveal('user-info1');">Datos</h4><hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info2');">Favoritos</h4><hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info3');">Cambio contraseña</h4><hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info4');">Carrito</h4>
                    </nav>
                </div>
            </div>
            <div id="user-data" class="col-md-10 col-sm-2 pb-0">
                <span class="user-info" id="user-info1">
                    <div class="container">
                        <h1>DATOS PERSONALES</h1>
                        <div class="container p-4">
                            <form method="post">
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
                                    @if (session('mensaje'))
                                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                                    @endif
                                </div>
                                <div class="row m-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Nombre</label><input class="form-control" type="text" name="name" placeholder="Mínimo 3 caracteres" value="{{ old('name') }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Apellidos</label><input class="form-control" type="text" name="surname" placeholder="Mínimo 3 caracteres" value="{{ old('surname') }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Número de teléfono</label><input class="form-control" type="tel" name="phone" placeholder="*" value="{{ old('phone') }}" required><br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Género</label><select class="form-control" type="text" name="genre"
                                            value>
                                            <option selected="selected" disabled>-</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="O">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Correo electrónico</label>
                                        <div class="input-group">
                                            <div class="input-group-text">@</div><input class="form-control" type="email" name="email" placeholder="*" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Fecha de nacimiento*</label><input class="form-control" type="date" name="birth_date" required><br>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button id="btn-signup" class="bg-success btn mb-5 text-light text-center" type="submit">Cambiar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </span>
                <span class="user-info" id="user-info2">
                    <div class="container">
                        <h1>PRODUCTOS FAVORITOS</h1>
                        <div class="container p-4">
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="img-fluid" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                    <div class="card-body">
                                        <h4 class="card-title">Special title treatment</h4>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
                                <label class="mb-0">Nueva contraseña</label><input id="input-user-reppass" class="form-control" type="password" name="password" placeholder="Mínimo 8 caracteres" required><br>
                                <label class="mb-0">Repetir nueva contraseña</label><input id="input-user-reppass" class="form-control" type="password" name="password" placeholder="*" required>
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
                                    <button id="btn-signup" class="bg-success btn mb-5 text-light text-center mt-5" type="submit">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </span>
                <span class="user-info" id="user-info4">
                    <div class="container">
                        <h1>CARRITO</h1>
                        <div class="container p-4">
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img class="img-fluid" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                    <div class="card-body">
                                        <h4 class="card-title">Special title treatment</h4>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </section>
    <script>
        function reveal(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'inline') {
                e.style.display = 'none';
            } else {
                var allTexts = document.querySelectorAll(".user-info");
                for (var i = 0, len = allTexts.length; i < len; i++) {
                    allTexts[i].style.display = 'none';
                }
                e.style.display = 'inline';
            }
        }
    </script>
@endsection
