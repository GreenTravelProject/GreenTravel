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
    <div class="container mt-5">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">img</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
