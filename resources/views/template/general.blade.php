@extends('template.template')
@section('banner')
    <header class="bg-success py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">GREEN TRAVEL</h1>
                <p class="lead fw-normal text-white-50 mb-0">Viajes sostenibles</p>
            </div>
        </div>
    </header>
@endsection
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 align-items-center">
                    <a class="navbar-brand" href="{{ route('index') }}"><img src="./img/LOGO_NAV.png" alt=""></a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#!">Deportes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Camping</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Extranjero</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Acuático</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Animales</a></li>
                    </ul>
                </ul>
            </div>
            <div class="d-flex gap-3">
                <button class="btn btn-outline-dark">
                    <i class="bi bi-person-fill"></i>
                    <span class="d-lg-inline d-none">Mi cuenta // Iniciar Sesión</span>
                </button>
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1 " data-bs-toggle="collapse"></i>
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </div>
        </div>
    </nav>
@endsection

@section('footer')
    <footer class="py-5 bg-success">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright PRUEBAS Your Website 2022</p>
        </div>
    </footer>
@endsection
