@extends('template.general')

@section('shoppingCart')
    <!--Mostramos los productos añadidos al carrito-->
    <div class="container d-grid py-4">
        <div class="row gap-3">
            @if (isset($cart->products[0]))
                <div class="col-md-8 bg5">
                @else
                    <div class="col-md-8 bg5" id="containerCarrito">
            @endif
            <h2 class="py-3">Cesta de la compra</h2>
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
            @if (isset($cart->products[0]))
                @foreach ($cart->products as $product)
                    <div class="row p-3 border-top border-bottom text-start gap-2">
                        <div class="col-md-2 d-flex align-items-center flex-column gap-3">
                            <img class="img-fluid" src="{{ URL::asset("img/$product->img") }}" alt="">
                            <p class="fw-bold text-success">{{ $product->price }}€</p>
                        </div>
                        <div class="col">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="col-md-3 d-flex flex-row justify-content-center gap-3 align-items-center">
                            <a href="{{ route('minus', $product->id) }}"><i
                                    class="bi bi-dash-circle-fill text-black"></i></a>
                            <p class="fw-bold m-0">{{ $product->pivot->amount }}</p>
                            <a href="{{ route('plus', $product->id) }}"><i
                                    class="bi bi-plus-circle-fill text-black"></i></a>
                            <a href="{{ route('deleteProduct', $product->id) }}"><i
                                    class="bi bi-trash-fill text-danger"></i></a>
                            <p class="fw-bold m-0">{{ $product->pivot->amount * $product->price }}€</p>
                        </div>
                    </div>
                @endforeach
                <div class="row p-3 border-top border-bottom text-end gap-2">
                    <p>Total: {{ $cart->total }}€</p>
                </div>
            @else
                <h4 class="p-5 text-secondary">No hay artículos en el carrito, {{ $cart->user->name }}</h4>
            @endif
        </div>
        <div class="col bg5 p-4">
            <h2>Datos de compra</h2>
            <div class="text-start pt-2 mt-3">
                <p>Nombre: {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                <p>Teléfono: {{ Auth::user()->phone }}</p>
                <p>DIRECCIÓN</p>
                {{-- CUANDO TENGAMOS LAS DIRECCIONES :D --}}
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('user') }}" class="btn btn-danger">Cambiar datos</a>
                    @if (isset(Auth::user()->cart->products[0]))
                        <a href="{{ route('buy') }}" class="btn btn-success">Comprar</a>
                    @else
                        <button href="{{ route('buy') }}" type="button" class="btn btn-success" disabled>Comprar</button>
                    @endif
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection
