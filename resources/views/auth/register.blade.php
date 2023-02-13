@extends('template.general2')
@section('login')
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
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
                    <label for="name" >{{ __('Nombre') }}</label>
                    <input  id="name" class="form-control" type="text"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="surname">{{ __('Apellidos') }}</label>
                    <input  id="surname" name="surname" class="form-control" type="text"  @error('surname') is-invalid @enderror"  value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="phone">{{ __('Teléfono') }}</label>
                    <input  id="phone" class="form-control" type="tel"  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
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
                    <label for="birth_date">{{ __('Fecha de nacimiento') }}</label>
                    <input  id="birth_date" class="form-control" type="date"  @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>
                    @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
            </div><hr class="mt-4 mb-5">
            <div class="row m-3">
                <div class="col-sm-12">

                    <label for="email">{{ __('E-mail') }}</label>
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input  id="email" class="form-control" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>

                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="password" >{{ __('Contraseña') }}</label>
                    <input  id="password" class="form-control" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-signup" class="bg-success btn mb-5 text-light text-center" type="submit">{{ __('Registrar') }}</button>
            </div>
        </form>
    </div>
@endsection
