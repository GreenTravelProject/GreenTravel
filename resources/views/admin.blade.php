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
        <div class="col border-end">col</div>
        <div class="col border-end">col</div>
        <div class="col border-end">col</div>
        <div class="col border-end">col</div>
        <div class="col">col</div>
    </div>
</div>
<div class="container mt-5">
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Example</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection