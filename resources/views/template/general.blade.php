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
                    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ URL::asset('img/LOGO_NAV.png') }}"
                            alt=""></a>
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
                <button id="btn-session" class="btn btn-outline-dark">
                    <i class="bi bi-person-fill"></i>
                    <a href="{{ route('login') }}"><span class="d-lg-inline d-none">Mi cuenta // Iniciar Sesión</span></a>
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
    <div class="container-fluid justify-content-center bg-success text-light">
        <div class="row py-5">
            <div class="col">
                <div class="card border-0">
                    <div class="card-body text-center bg-success">
                        <h2><b>Suscríbete</b></h2>
                        <p class="mb-3">Escribe tu correo electrónico para estar atento</p>
                        <div class="row text-center justify-content-center">
                            <div class="col-auto">
                                <div class="input-group-lg input-group">
                                    <input type="text" class="form-control" placeholder="Email"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-dark" type="button" id="button-addon2"><b>Enviar</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-around">
            <div class="col-11">
                <div class="row justify-content-center">
                    <div class="col-md-3 col-12 font-italic align-items-center mt-md-3 mt-3">
                        <h5><span><img src="" class="img-fluid mb-1 "></span><b class="text-white">GREEN <span
                                    class="text-white"> TRAVEL</span></b></h5>
                        <small class="copy-rights cursor-pointer">&#9400;2023 Ilerna Daw</small><br>
                        <small>Copyright. All Rights Reserved.</small>
                    </div>
                    <div class="col-md-3 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4"><a class="text-white" href="{{ url('/') }}">Deportes</a></li>
                            <li><a class="text-white" href="{{ url('/') }}">Camping</a></li>
                            <li><a class="text-white" href="{{ url('/') }}">Acuáticos</a></li>
                            <li><a class="text-white" href="{{ url('/') }}">Animales</a></li>
                            <li><a class="text-white" href="{{ url('/') }}">Extranjero</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4"></li>
                            <li><a class="text-white" href="https://github.com/lauravcruz" target=_blank>Laura</a></li>
                            <li><a class="text-white" href="https://github.com/neumanv" target=_blank>Guillermo</a></li>
                            <li><a class="text-white" href="https://github.com/jgTrue" target=_blank>Jairo</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-auto col-md-3 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4">Offer</li>
                            <li>Intergrated Security Platform</li>
                            <li>Core Features</li>
                            <li>Product Features</li>
                            <li>Pricing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
