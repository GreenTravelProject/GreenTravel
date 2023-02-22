@extends('template.general')
@section('templateUser')
    <section id="user-cont">
        <div class="row m-0 w-100" id="full-page">
            <div class="col-md-4 col-lg-2 col-sm-2 p-0 bg-light">
                <div class="profile-sidebar">
                    <div class="profile-user">
                        <div class="profile-name text-center">
                            <h1 class="p-4">MENÚ</h1>
                            <hr class="m-0">
                        </div>
                    </div>
                    <div class="profile-menu mt-0">
                        <a id="menu-user" href="{{ route('user') }}">
                            <h4 class="text-dark p-4">Cuenta</h4>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('favoritos') }}">
                            <h4 class="text-dark p-4">Favoritos</h4>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('cambiarPassword') }}">
                            <h4 class="text-dark p-4">Cambio contraseña</h4>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('direccion') }}">
                            <h4 class="text-dark p-4">Dirección</h4>
                        </a>
                        <hr class="m-0">
                        <a class="text-decoration-none text-black" href="{{ route('cart') }}">
                            <h4 class="p-4">Carrito</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div id="user-data" class="col-md-8 col-lg-10 col-sm-2 pb-0">
                @yield('cambioPassword')
                @yield('datosPersonales')
                @yield('direccion')
                @yield('favoritos')
            </div>
        </div>
        </div>
    </section>
@endsection
