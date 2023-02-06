@extends('template.general2')
@section('nav')
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Deportes</a></li>
                                <li><a class="dropdown-item" href="#!">Camping</a></li>
                                <li><a class="dropdown-item" href="#!">Extranjero</a></li>
                                <li><a class="dropdown-item" href="#!">Acuático</a></li>
                                <li><a class="dropdown-item" href="#!">Animales</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="navbar-brand" href="{{ route('index') }}">LOGO</a>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrito
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>-->
@endsection
@section('login')
    <div class="container p-5 col-auto">
        <form action="post">
            <i class="bi bi-person-circle"></i>
            <input class="form-control w-25" type="text" name="name" placeholder="Email o user" required><br>
            <input class="form-control w-25" type="password" name="password" placeholder="Contraseña" required><br>
            <input class="bg-success btn" type="submit">
        </form>
    </div>
@endsection
