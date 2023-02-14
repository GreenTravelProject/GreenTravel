@extends('template.template')
@section('admin')
    <header class="bg-success py-1">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">ADMINISTRACIÓN</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row bg-secondary text-center p-3 text-white menuAdmin">
            <div class="col border-end"><a href="#">Categorías</a></div>
            <div class="col border-end"><a href="{{ route('admin.products') }}">Productos</a></div>
            <div class="col border-end"><a href="{{ route('admin.users') }}">Usuarios</a></div>
            <div class="col border-end" class="text-white">col</div>
            <div class="col">col</div>
        </div>
    </div>
    @yield('welcomeAdmin')
    @yield('products')
    @yield('users')
    @yield('edit')
@endsection
