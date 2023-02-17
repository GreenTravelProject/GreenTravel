@extends('template.general')

@section('shoppingCart')
    <!--Mostramos los productos añadidos al carrito-->
    <div class="container d-grid p-4">
        <div class="row gap-3">
            <div class="col-md-8 bg5 p-4">
                <h2>Cesta de la compra</h2>
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
                        <div class="col-md-2 d-flex flex-row justify-content-center gap-3 align-items-center">
                            <a href=""><i class="bi bi-dash-circle-fill"></i></a>
                            <p class="fw-bold">{{ $product->pivot->amount }}</p>
                            <a href=""><i class="bi bi-plus-circle-fill"></i></a>
                            <a href="cart/deleteProduct/{{ $product->id }}"><i class="bi bi-trash-fill text-danger"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col bg5 p-4">
                <h2>Datos personales</h2>
            </div>
        </div>


    </div>
@endsection
