@extends('template.templateUser')
@php
use App\Http\Controllers\AddressController;
use App\Models\Adress;
@endphp
@section('direccion')
<div class="container">
    <h1 class="mt-3">DIRECCIÓN</h1>
    <div class="container p-4">
        <form action="{{--route('cambiar_direccion')--}}" method="">
            @method('PUT')
            @csrf
            <div class="row m-3">
                <div class="col-md-6 col-sm-12">
                    <label for="">{{__('Seleccionar dirección')}}</label>
                    <select class="form-control" type="text" name="country" required autofocus>
                        <br>
                        <option selected disabled>-</option>
                        <?php
                        $direcciones = Adress::where('user_id', Auth::id())->get();

                            foreach ($direcciones as $value) {
                                if($value->status){
                                    echo('<option selected value='.$value.'>'.$value->country.', '.$value->city.', '.$value->street.', nº '.$value->number.', Edificio '.$value->building.
                                        ', '.$value->floor.' - '.$value->door.'</option>');
                                }else{
                                    echo('<option value='.$value.'>'.$value->country.', '.$value->city.', '.$value->street.', nº '.$value->number.', Edificio '.$value->building.
                                        ', '.$value->floor.' - '.$value->door.'</option>');
                                }
                            }
                        ?>
                    </select>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                    @endif
                    @if (session('mensaje'))
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
                </div>
                <div class="col-md-6 col-sm-12 d-grid d-md-flex mt-1 pt-1 justify-content-md-start">
                    <button id="btn-signup" class="bg-success btn mb-2 text-light text-center mt-3" type="submit">Seleccionar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container p-4">
        <h5>Crear una dirección</h5>
        <form action="{{ route('crear_direccion') }}" method="POST">
            @csrf

            <div class="row m-3">
                <div class="col-md-6 col-sm-12">
                    <label>País</label>
                    <select class="form-control" type="text" name="country" required autofocus>
                        <br>
                        <option selected disabled>-</option>
                        <?php
                            $countries = ['Alemania', 'Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaiyán', 'Bélgica', 'Bielorrusia',
                                'Bosnia y Herzegovina', 'Bulgaria', 'Chipre', 'Croacia', 'Dinamarca', 'Eslovaquia', 'Eslovenia', 'España', 'Estonia', 'Finlandia', 'Francia', 'Georgia', 'Grecia',
                                'Hungría', 'Irlanda', 'Islandia', 'Italia', 'Kosovo', 'Letonia', 'Liechtenstein', 'Lituania', 'Luxemburgo', 'Macedonia', 'Malta', 'Moldavia',
                                'Mónaco', 'Montenegro', 'Noruega', 'Países Bajos', 'Polonia', 'Portugal', 'Reino Unido', 'República Checa', 'Rumanía', 'Rusia',
                                'San Marino', 'Suecia', 'Suiza', 'Turquía', 'Ucrania', 'Serbia'];
                            foreach ($countries as $value) {

                                echo('<option value='.$value.'>'.$value.'</option>');

                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label id="nacimiento">Localidad</label>
                    <input class="form-control" type="text" name="city" placeholder="*" required><br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label>Calle</label>
                    <input class="form-control" type="text" name="street" placeholder="Dirección exacta" required>
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Número</label>
                    <input class="form-control" type="text" name="number" placeholder="*" required>
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Bloque</label><input class="form-control" type="text" name="building">
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Planta</label><input class="form-control" type="number" name="floor">
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Puerta</label><input class="form-control" type="text" name="door">
                </div><br>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-signup" class="bg-success btn mb-2 text-light text-center mt-3" type="submit">Crear dirección</button>
            </div>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
            @endif
            @if (session('mensaje'))
                <div class="alert alert-success">{{ session('mensaje') }}</div>
            @endif
        </form>
    </div>
</div>
@endsection
