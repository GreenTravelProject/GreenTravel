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
        <div class="row bg-secondary text-center">
            <div class="col border-end">Categorías</div>
            <div class="col border-end">Productos</div>
            <div class="col border-end">Usuarios</div>
            <div class="col border-end">col</div>
            <div class="col">col</div>
        </div>
    </div>
    @yield('products')
    @yield('edit')
@endsection
