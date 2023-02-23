@extends('template.general3')
@section('login')
    <div class="bgLogin pt-5">
        <div id="login">
            <form method="POST" action="{{ route('login') }}" class="text-center">
                @csrf
                <h1>INICIAR SESIÓN</h1><br>
                @if (session('mensaje'))
                    {

                    {{ session('mensaje') }}

                    }
                @endif
                @error('email')
                @enderror
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif
                <h1><i class="bi bi-person-circle fs-1"></i></h1>
                <div class="form-group row mb-3">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="password" class="col-form-label text-md-right">{{ __('Contraseña') }}</label>

                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div>
                        <button type="submit" class="bg-success btn text-light">
                            {{ __('Iniciar sesión') }}
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('He olvidado mi contraseña') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
        <p id="p-login" class="p-4 text-center">Si no estás registrado pulsa <a href="{{ route('register') }}">aquí</a>
        </p>
    </div>
@endsection
