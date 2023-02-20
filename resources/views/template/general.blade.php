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
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 align-items-center">
                    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ URL::asset('img/LOGO_NAV.png') }}"></a>
                    <ul class="navbar-nav">
                        @foreach ($categories as $category)
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person-fill"></i>
                                {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-fill-add"></i>
                                    {{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="dropdown d-flex flex-lg-row flex-column gap-2">
                            <a class="btn btn-success" href="{{ Route('cart') }}"><i class="bi bi-cart4"></i></a>
                            {{-- TODO: mostrar carrito 
                                cc             @foreach (Auth::user()->cart->products as $product)
                                <p>{{ $product->name }}</p>
                                @endforeach --}}
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <a href="#" onclick="showCart()" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span
                                    class="badge">3</span></a>
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
    {{-- TODO:Empezando carrito, hay que arreglarlo --}}
    <div class="containerShopping">
        <div id="shoppingCart" class="shopping-cart d-none">
            <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text">$2,229.97</span>
                </div>
            </div>
            <!--end shopping-cart-header -->

            <ul class="shopping-cart-items">
                <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                    <span class="item-name">Sony DSC-RX100M III</span>
                    <span class="item-price">$849.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                </li>

                <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                    <span class="item-name">KS Automatic Mechanic...</span>
                    <span class="item-price">$1,249.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                </li>

                <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                    <span class="item-name">Kindle, 6" Glare-Free To...</span>
                    <span class="item-price">$129.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                </li>
            </ul>

            <a href="#" class="button">Checkout</a>
        </div>
    </div>
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
                            @foreach ($categories as $category)
                                <li class="mt-md-1"><a class="text-white"
                                        href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
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
