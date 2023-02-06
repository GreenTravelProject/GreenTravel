@extends('template.general')

@section('shoppingCart')
    <!--Mostramos los productos añadidos al carrito-->
    <div class="d-grid bg4">
        <div class="row m-0">
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
                                    <h5 class="m-2">Paquete de viaje</h5>
                                </div>
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
                    {{$products->links()}}
                </div>
            </div>
            <div class="col-lg-6 py-5 px-3">
                <h5 class="display-5 text-center mb-3">Datos personales</h5>
                <!--Este formulario debería cargar los datos del usuario registrado-->
                <form class="row g-3 needs-validation">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-8">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>

                    <div class="col-md-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="col-md-5">
                        <label for="poblacion" class="form-label">Población</label>
                        <input type="text" class="form-control" id="poblacion" name="poblacion" required>
                    </div>
                    <div class="col-md-5">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                    </div>
                    <div class="col-md-2">
                        <label for="cp" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="cp" name="cp" required>
                    </div>

                    <!--PAGO???-->
                    <div class="col-12">
                        <button class="btn btn-success" type="submit">Comprar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
