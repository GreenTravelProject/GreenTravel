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
                        <h4 class="p-4" onclick="reveal('user-info1');">Datos</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info2');">Favoritos</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info3');">Cambio contraseña</h4>
                        <hr class="m-0">
                        <h4 class="p-4" onclick="reveal('user-info4');">Carrito</h4>
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
                                        <label>Nombre</label><input class="form-control" type="text" name="name" placeholder="Mínimo 3 caracteres" value="{{ $usuario->name }}" required><br>
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
                                            <option selected="selected" disabled>-</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="O">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Correo electrónico</label>
                                        <div class="input-group">
                                            <div class="input-group-text">@</div><input class="form-control" type="email" name="email" placeholder="*" value="{{ $usuario->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label id="nacimiento">Fecha de nacimiento*</label><input class="form-control"
                                            type="date" name="birth_date" required value="{{ $usuario->birth_date }}"><br>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div class="row m-3">
                                        <div class="col-md-6 col-sm-12">
                                            <label>País</label><select class="form-control" type="text" name="country"
                                                required><br>
                                                <option disabled selected>-</option>
                                                <option value="DE">Alemania</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AT">Austria</option>
                                                <option value="BE">Bélgica</option>
                                                <option value="BY">Bielorrusia</option>
                                                <option value="BA">Bosnia</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="CY">Chipre</option>
                                                <option value="HR">Croacia</option>
                                                <option value="DK">Dinamarca</option>
                                                <option value="SI">Eslovenia</option>
                                                <option value="ES">España</option>
                                                <option value="EE">Estonia</option>
                                                <option value="FI">Finlandia</option>
                                                <option value="FR">Francia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Grecia</option>
                                                <option value="HU">Hungría</option>
                                                <option value="IE">Irlanda</option>
                                                <option value="IS">Islandia</option>
                                                <option value="FO">Islas Feroe</option>
                                                <option value="IT">Italia</option>
                                                <option value="LV">Letonia</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lituania</option>
                                                <option value="LU">Luxemburgo</option>
                                                <option value="MK">Macedonia</option>
                                                <option value="MT">Malta</option>
                                                <option value="MD">Moldavia</option>
                                                <option value="MC">Mónaco</option>
                                                <option value="NO">Noruega</option>
                                                <option value="NL">Países Bajos</option>
                                                <option value="PL">Polonia</option>
                                                <option value="PT">Portugal</option>
                                                <option value="UK">Reino Unido</option>
                                                <option value="CZ">República Checa</option>
                                                <option value="SK">Eslovaquia</option>
                                                <option value="RO">Rumania</option>
                                                <option value="RU">Rusia</option>
                                                <option value="SM">San Marino</option>
                                                <option value="SE">Suecia</option>
                                                <option value="CH">Suiza</option>
                                                <option value="UA">Ucrania</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label id="nacimiento">Localidad</label><input class="form-control" type="text"
                                                name="city" placeholder="*" required><br>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Correo electrónico</label><input class="form-control" type="text" name="street" placeholder="Dirección exacta" value="{{ old('email') }}" required>
                                        </div><br>
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
                                <label class="mb-0">Nueva contraseña</label><input id="input-user-reppass"
                                    class="form-control" type="password" name="password"
                                    placeholder="Mínimo 8 caracteres" required><br>
                                <label class="mb-0">Repetir nueva contraseña</label><input id="input-user-reppass"
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
                        <h1>CARRITO</h1>
                        <div class="container p-4">

                        </div>
                    </div>
                </span>
            </div>
        </div>
        </div>
    </section>
    <script>
        let expanded = false;

function reveal(id) {
    let e = document.getElementById(id);

    if(e.style.display == "inline"){
        e.style.display = "none";
    }else{
        let allTexts = document.querySelectorAll(".user-info");
        for (let i = 0, len = allTexts.length; i < len; i++) {
            allTexts[i].style.display = "none";
        }
        
        e.style.display = "inline";
    }
}
    </script>
@endsection
