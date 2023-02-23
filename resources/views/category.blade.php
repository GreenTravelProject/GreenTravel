@extends('template.general')
@section('category')
    <!--descripción de la categoría-->
    <!--Insertar según bbdd el bg de cada categoría-->
    <div class="bg{{ $category->name }} description d-flex justify-content-center align-items-start flex-column p-5">
        <h1 class="display-4 fw-bolder">{{ $category->name }}</h1>
        <p class="lead fw-normal">{{ $category->description }}</p>
        <div class="overlay"></div>
    </div>
    </div>
    <!-- Product section-->
    <section class="bgProducts pt-5">
        <div class="container px-4 px-lg-5 products">

            <!--Desde la BBDD hay que imprimir los datos de cada producto-->
            @foreach ($products as $product)
                <div class="row gx-4 gx-lg-5 align-items-center lineaProducto">
                    <div class="col-md-6 py-5"> <img id="catpic"
                            class="card-img-top mb-5 mb-md-0"src="{{ URL::asset("img/products/$product->img") }}"
                            alt="" />
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                        <div class="fs-5 mb-5">
                            <span>{{ $product->price }} €</span>
                        </div>
                        <p class="lead">{{ $product->description }}</p>
                        <div class="d-flex gap-3 justify-content-end">
                            {{-- Si el usuario no inicia sesión verá @guest, cuando tenga sesión verá @else --}}
                            @guest

                                <a href="{{ route('login') }}" type="button" class="btn btn-outline-dark flex-shrink-0" disabled>
                                    <i class="bi-cart-fill me-1"></i>
                                    Debes iniciar sesión
                                </a>
                            @else
                                <form action="{{ route('fav_add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                        @php
                                            $favorite = DB::table('favorites')
                                                ->where('user_id', Auth::id())
                                                ->first();
                                        @endphp
                                        @if (DB::table('favorite_product')->where('product_id', $product->id)->where('favorite_id', $favorite->id)->doesntExist())
                                            <i class="bi bi-heart"></i>
                                        @else
                                            <i class="bi bi-heart-fill text-danger"></i>
                                        @endif

                                    </button>
                                </form>

                                <form action="{{ route('cart_add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="bi-cart-fill me-1"></i>
                                        Añadir al carrito
                                    </button>
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container py-5 d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </section>
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
                                                    {{ $products[$i]->stock }}
                                                </div>
                                                <!-- Product image-->
                                                <img class="card-img-top" src="{{ URL::asset('img/products/' . $products[$i]->img) }}" alt="{{ $products[$i]->name }}" />
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

                                                            <a href="{{ route('login') }}" type="button" class="btn btn-outline-dark flex-shrink-0"
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
    </section>
@endsection
