@extends('template.general')

@section('shoppingCart')
    <!--Mostramos los productos añadidos al carrito-->
    <div class="d-grid bg4">
        <div class="row m-0">

{{$products}}


            <div class="col-lg-6 py-5 px-5">
                <h5 class=" display-5 text-center mb-3">Carrito</h5>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div>
                                    <!--imagen del paquete de viaje-->
                                    <img src="" class="img-fluid rounded-3" alt="Shopping item">
                                </div>
                                <div class="p-2">
                                <h5 class="m-2">'Paquete de viaje'</h5>
                                </div>
                                @foreach ($products as $product)
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6 py-5"><img class="card-img-top mb-5 mb-md-0"
                                            src="{{ URL::asset("img/$product->img") }}" alt="..." />
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                                        <div class="fs-5 mb-5">
                                            <span>{{ $product->price }} €</span>
                                        </div>
                                        <p class="lead">{{ $product->description }}</p>
                                        <div class="d-flex gap-3 justify-content-end">
                                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                                <i class="bi bi-heart-fill"></i>
                                            </button>
                                            {{-- No funciona --}}
                                            <form action="{{ route('add')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                                    <i class="bi-cart-fill me-1"></i>
                                                    Añadir al carrito
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-center gap-3">
                                <div class="col-4">
                                    <!--ESTABLECER LA CANTIDAD Y QUE MODIFIQUE EL PRECIO-->
                                    <form action="">
                                        <input type="number" class="form-control" name="cantidad" id="cantidad"
                                            placeholder="">
                                    </form>
                                </div>
                                <div>
                                    <p class="fw-normal">PRECIO</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


                    {{-- <!--PAGO???-->
                    <div class="col-12">
                        <button class="btn btn-success" type="submit">Comprar</button>
                    </div> --}}

            </div>
        </div>
    </div>
@endsection
