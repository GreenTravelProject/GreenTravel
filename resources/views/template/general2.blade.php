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

@section('footer')
    <div class="container-fluid justify-content-center pt-5 pb-5 bg-success text-light">
        <div class="row justify-content-around">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-12 font-italic align-items-center mt-md-3 mt-3">
                        <h5><span><img src="" class="img-fluid mb-1 "></span><b class="text-white">GREEN <span class="text-white"> TRAVEL</span></b></h5>
                        <small class="copy-rights cursor-pointer">&#9400;2023 Ilerna Daw</small><br>
                        <small>Copyright. All Rights Reserved.</small>
                    </div>
                    <div class="col-md-2 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li class="mt-md-1"><a class="text-white" href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-2 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4"></li>
                            <li><a class="text-white" href="https://github.com/lauravcruz" target=_blank>Laura</a></li>
                            <li><a class="text-white" href="https://github.com/neumanv" target=_blank>Guillermo</a></li>
                            <li><a class="text-white" href="https://github.com/jgTrue" target=_blank>Jairo</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-12 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-md-3 mt-4">¿Qúe necesitas?</li>
                            <li>Licencia y seguridad</li>
                            <li>Nuestra empresa</li>
                            <li>Nuestros productos</li>
                            <li>Precios</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

