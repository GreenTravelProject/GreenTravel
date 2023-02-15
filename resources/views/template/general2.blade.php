@extends('template.template')
@section('banner')
    <header class="bg-success py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <a id="title" href="{{ route('index') }}"><h1 class="display-4 fw-bolder text-white">GREEN TRAVEL</h1></a>
                <p class="lead fw-normal text-white-50 mb-0">Viajes sostenibles</p>
            </div>
        </div>
    </header>
@endsection

{{-- @section('footer')
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
                                    <input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                            @foreach ($categories as $category)
                            <li class="mt-md-3 mt-4"><a class=" text-decoration-none" href="{{ route('category', $category->id) }}">Deportes</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4">Your needs</li>
                            <li>Intergrated Security Platform</li>
                            <li>Core Features</li>
                            <li>Product Features</li>
                            <li>Pricing</li>
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
@endsection --}}
