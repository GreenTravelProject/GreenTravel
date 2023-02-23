@extends('template.template')
@section('admin')
    <header class="bg-success py-5">
        <div class="container">
            <a id="title" href="{{ route('admin') }}">
                <h1 class="display-4 fw-bolder text-white">ADMINISTRACIÓN</h1>
            </a>
        </div>
    </header>
    <div class="container">
        <div class="row bg-secondary text-center py-3 text-white menuAdmin">
            <div class="col border-end"><a href="{{ route('admin.categories') }}">Categorías</a></div>
            <div class="col border-end"><a href="{{ route('admin.products') }}">Productos</a></div>
            <div class="col border-end"><a href="{{ route('admin.users') }}">Usuarios</a></div>
            <div class="col"><a href="{{ route('admin.deliveries') }}">Pedidos</a></div>
        </div>
    </div>
    @yield('products')
    @yield('users')
    @yield('deliveries')
    @yield('edit')
@endsection
