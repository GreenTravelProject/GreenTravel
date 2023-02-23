@extends('template.general')

@section('index')
    <section class="pt-5 pb-5 bg4">
        <div class="container">
            <div class="row">
                <div class="col-1 d-flex justify-content-center align-items-center">
                    <a id="btn-carrousel" class="btn btn-success" href="#destacados" role="button" data-bs-slide="prev">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </div>
                <div class="col-10">
                    <div id="destacados" class="carousel slide" data-bs-ride="carousel">
                        <!--Este carrousel lo tenemos que imprimir con un for para que saque los datos de la BBDD-->
                        <div class="carousel-inner">

                            @foreach ($categories as $category)
                                {{-- La primera categoría será la que esté activa --}}
                                @if ($category == $categories[0])
                                    <div class="carousel-item active">
                                    @else
                                        <div class="carousel-item">
                                @endif
                                <div class="row">
                                    @php
                                        $products = $category->products;
                                    @endphp
                                    {{-- Saldran 4 tarjetas por categoría --}}
                                    @for ($i = 0; $i <= 3; $i++)
                                        <div class="col-md-3 mb-3">
                                            <div class="card">
                                                <!-- Sale badge-->
                                                <div class="badge bg-dark text-white position-absolute"
                                                    style="top: 0.5rem; right: 0.5rem">
                                                    <i class="bi bi-person-fill">{{ $products[$i]->stock }}</i>
                                                </div>
                                                <!-- Product image-->
                                                <img class="card-img-top"
                                                    src="{{ URL::asset('img/products/' . $products[$i]->img) }}"
                                                    alt="{{ $products[$i]->name }}" />
                                                <!-- Product details-->
                                                <div class="card-body p-4">
                                                    <div class="text-center">
                                                        <!-- Product name-->
                                                        <h5 class="fw-bolder">
                                                            {{ mb_strimwidth($products[$i]->name, 0, 18, '...') }}</h5>
                                                        <!-- Product reviews-->
                                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                                            <div class="bi-star-fill"></div>
                                                            <div class="bi-star-fill"></div>
                                                            <div class="bi-star-fill"></div>
                                                            <div class="bi-star-fill"></div>
                                                            <div class="bi-star-fill"></div>
                                                        </div>
                                                        <!-- Product price-->
                                                        <span
                                                            class="text-muted text-decoration-line-through">{{ $products[$i]->price * 1.5 }}€</span>
                                                        {{ $products[$i]->price }}€
                                                    </div>
                                                </div>
                                                <!-- Product actions-->
                                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                    <div class="text-center">
                                                        @guest

                                                            <a type="button" href="{{ route('login') }}" class="btn btn-outline-dark flex-shrink-0"
                                                                disabled>
                                                                <i class="bi-cart-fill me-1"></i>
                                                                Debes iniciar sesión
                                                            </a>
                                                        @else
                                                            <form action="{{ route('cart_add') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="product"
                                                                    value="{{ $products[$i]->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-outline-dark flex-shrink-0" type="button">
                                                                    <i class="bi-cart-fill me-1"></i>
                                                                    Añadir al carrito
                                                                </button>
                                                            </form>

                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center">
                <a id="btn-carrousel" class="btn btn-success" href="#destacados" role="button" data-bs-slide="next">
                    <i class="bi-caret-right-fill"></i>
                </a>
            </div>
        </div>
        </div>
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </section>
    <section class="container-fluid p-5 bg-success">
        <div class="container">
            <h5 class="m-0 p-3 text-center text-white">En Green Travel estamos comprometidos con facilitar las experiencias
                divertidas y saludables a todos nuestros usuarios, integrando para ello la sostenibilidad en su actividad
                diaria, habiendo obtenido el Certificado “S” de Turismo Sostenible, por su contribución a los Objetivos de
                Desarrollo Sostenibles relativos a Seguridad y Salud (ODS 3), Agua (ODS 6) y Energía (ODS 7).</h5>
        </div>
    </section>
    <section class="categorias pt-5 pb-5 bgindex">
        <h1 class="display-4 text-center">CATEGORÍAS</h1>
        <div class="p-5 gridCategory d-grid">
            @foreach ($categories as $category)
                <div class="p-0 m-0 position-relative casilla"><a href="{{ route('category', $category->id) }}">
                        <p class="position-absolute text-category">{{ $category->name }}</p>
                        <div class="overlay {{ strtolower($category->name) }}"></div>
                        <img src="{{ URL::asset('img/' . $category->img) }}" class="img-fluid p-0 m-0"
                            alt="{{ $category->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
