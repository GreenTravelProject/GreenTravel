@extends('template.general2')
@section('login')
    <div class="container">
        <form action="post">
            <h1 class="text-center mt-5">CREA TU CUENTA</h1>
            <p class="text-center">Regístrate en Green Travel para disfrutar de todas las experiencias que ofrecemos.<br>Si ya estas registrado pulsa <a href="{{ route('login') }}">aquí</a></p>
            <div class="row m-3">
                <div class="col-md-6 col-sm-12">
                    <label>Nombre</label><input class="form-control" type="text" name="name" placeholder="*" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Apellidos</label><input class="form-control" type="text" name="surname" placeholder="*" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Número de teléfono</label><input class="form-control" type="tel" name="phone" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{3}" placeholder="*" required><br>
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
                    <label>Fecha de nacimiento*</label><input class="form-control" type="date" name="birth_date" required><br>
                </div>
            </div><hr class="mt-4 mb-5">
            <div class="row m-3">
                <div class="col-sm-12">
                    <label>Correo electrónico</label><div class="input-group">
                    <div class="input-group-text">@</div><input class="form-control" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="*" required></div><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Contraseña</label><input class="form-control" type="password" name="password" placeholder="*" required><br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Repetir contraseña</label><input class="form-control" type="password" name="password_verify" placeholder="*" required><br>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="bg-success btn mb-5 w-25 text-light text-center" type="submit">Registrarse</button>
            </div>
        </form>
    </div>
@endsection
