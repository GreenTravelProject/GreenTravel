@extends('template.template')
@section('banner')
    <header class="bg-success py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <a id="title" href="{{ route('index') }}">
                    <h1 class="display-4 fw-bolder text-white">GREEN TRAVEL</h1>
                </a>
                <p class="lead fw-normal text-white-50 mb-0">Viajes sostenibles</p>
            </div>
        </div>
    </header>
@endsection
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container contenidoNav px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 align-items-center">
                    <a id="icono" class="navbar-brand" href="{{ route('index') }}"><img src="{{ URL::asset('img/LOGO_NAV.png') }}"></a>
                    <ul class="navbar-nav">
                        @foreach ($categories as $category)
                            <h4 class="m-0 nav-item"><a class="nav-link" href="{{ route('category', $category->id) }}">{{ $category->name }}</a></h4>
                        @endforeach
                    </ul>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <h5 class="nav-item m-0">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person-fill fs-3"></i>
                                {{ __('Login') }}</a>
                        </h5>
                        @if (Route::has('register'))
                            <h5 class="m-0 nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-fill-add fs-3"></i>
                                    {{ __('Register') }}</a>
                            </h5>
                        @endif
                    @else
                        <div class="dropdown d-flex flex-lg-row flex-column gap-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <a href="#" onclick="showCart()" id="cart" class="btn btn-success"><i
                                    class="bi bi-cart4 fs-4"></i> <span
                                    class="badge bg-danger">{{ count(Auth::user()->cart->products) }}</span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    @if (Auth::user()->admin)
                                        <a class="dropdown-item" href="{{ route('admin') }}">{{ __('Admin') }}</a>
                                        <a class="dropdown-item" href="{{ route('user') }}">{{ __('Usuario') }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user') }}">{{ __('Usuario') }}</a>
                                    @endif
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                        <!--end shopping-cart -->
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @guest
    @else
        <div class="containerShopping">
            <div id="shoppingCart" class="shopping-cart d-none">
                <div class="shopping-cart-header text-end">
                    <span class="lighter-text">Total:</span>
                    <span class="text-success">{{ Auth::user()->cart->total }}€</span>
                </div>
                <!--end shopping-cart-header -->

                <div class="shopping-cart-items">
                    @if (isset(Auth::user()->cart->products[0]))
                        @foreach (Auth::user()->cart->products as $product)
                            <div class="clearfix d-flex align-items-center">
                                <img src="{{ URL::asset("img/products/$product->img") }}" class="img-fluid w-25"
                                    alt="{{ $product->name }}" />
                                <div class="flex-column text-start">
                                    <span class="item-name">{{ $product->name }}</span>
                                    <span class="item-price">{{ $product->price }}€</span>
                                    <div class="d-flex flex-row gap-2">
                                        <a href="{{ route('minus', $product->id) }}"><i
                                                class="bi bi-dash-circle-fill text-black"></i></a>
                                        <p class="fw-bold m-0">{{ $product->pivot->amount }}</p>
                                        <a href="{{ route('plus', $product->id) }}"><i
                                                class="bi bi-plus-circle-fill text-black"></i></a>
                                    </div>

                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('deleteProduct', $product->id) }}"><i
                                            class="bi bi-trash-fill text-danger"></i></a>
                                    <p class="fw-bold m-0">{{ $product->pivot->amount * $product->price }}€</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="clearfix d-flex align-items-center">
                            <p class="p-5 text-secondary">No hay artículos en el carrito, {{ Auth::user()->name }}</p>
                        </div>
                    @endif
                </div>

                <a href="{{ Route('cart') }}" class="button">Ver carrito</a>
            </div>
        </div>
    @endguest
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

