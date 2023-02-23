@extends('template.templateUser')
@section('favoritos')
<div class="container">
    <h1 class="mt-3">PRODUCTOS FAVORITOS</h1>
    {{-- @foreach ($products as $product) --}}
    <div class="container p-4">
        <div class="row">

        @foreach ($favorites as $favorite)
            <div class="col-md-10 col-mb-4 col-lg-4">
                <div class="card mt-2">
                    <img class="img-fluid" src="{{ URL::asset("img/products/$favorite->img") }}">
                    <div class="card-body">
                        <h4 class="card-title">{{$favorite->name}}</h4>
                        <p class="card-text">{{$favorite->price}}€</p>
                        <div class="d-flex gap-3 justify-content-between">
                            {{-- Si el usuario no inicia sesión verá @guest, cuando tenga sesión verá @else --}}
                            @guest

                            <a href="{{ route('login') }}" type="button" class="btn btn-outline-dark flex-shrink-0" disabled>
                                <i class="bi-cart-fill me-1"></i>
                                Debes iniciar sesión
                            </a>

                            @else
                            <form action="{{ route('fav_add') }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{ $favorite->id}}">
                                <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="bi bi-heart-fill text-danger"></i>
                                    </button>
                            </form>

                            <form action="{{ route('cart_add') }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{ $favorite->id }}">
                                <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                    Añadir al carrito
                                </button>
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    </div>
    {{-- @endforeach --}}
</div>
@endsection
