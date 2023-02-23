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
                            <h5 class="text-success p-4 m-1"><i class="bi bi-person-fill text-dark"></i> Cuenta</h5>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('favoritos') }}">
                            <h5 class="text-success p-4 m-1"><i class="bi bi-heart-fill text-danger"></i> Favoritos</h5>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('myDeliveries') }}">
                            <h5 class="text-success p-4 m-1"><i class="bi bi-box-seam text-dark"></i> Pedidos</h5>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('cambiarPassword') }}">
                            <h5 class="text-success p-4 m-1"><i class="bi bi-shield-lock-fill text-warning"></i> Contraseña</h5>
                        </a>
                        <hr class="m-0">
                        <a id="menu-user" href="{{ route('direccion') }}">
                            <h5 class="text-success p-4 m-1"><i class="bi bi-house-fill text-dark"></i> Dirección</h5>
                        </a>
                        <hr class="m-0">
                        <a class="text-decoration-none text-success" href="{{ route('cart') }}">
                            <h5 class="p-4 m-1"><i class="bi bi-cart4 text-dark"></i> Carrito</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div id="user-data" class="col-md-8 col-lg-10 col-sm-2 pb-0">
                @yield('cambioPassword')
                @yield('datosPersonales')
                @yield('direccion')
                @yield('favoritos')
                @yield('deliveries')
            </div>
        </div>
        </div>
    </section>
@endsection
