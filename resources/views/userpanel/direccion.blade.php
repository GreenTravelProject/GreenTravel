@extends('template.templateUser')
@section('direccion')
<div class="container">
    <h1>DIRECCIÓN</h1>
    <div class="container p-4">
        <form action="{{ route('direccion') }}" method="post">
            @csrf
            <div class="row m-3">
                <div class="col-md-6 col-sm-12">
                    <label>País</label><select class="form-control" type="text" name="country"
                        required><br>
                        <?php
                            $countries = [' * ', 'Alemania', 'Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaiyán', 'Bélgica', 'Bielorrusia',
                                'Bosnia y Herzegovina', 'Bulgaria', 'Chipre', 'Croacia', 'Dinamarca', 'Eslovaquia', 'Eslovenia', 'España', 'Estonia', 'Finlandia', 'Francia', 'Georgia', 'Grecia',
                                'Hungría', 'Irlanda', 'Islandia', 'Italia', 'Kosovo', 'Letonia', 'Liechtenstein', 'Lituania', 'Luxemburgo', 'Macedonia', 'Malta', 'Moldavia',
                                'Mónaco', 'Montenegro', 'Noruega', 'Países Bajos', 'Polonia', 'Portugal', 'Reino Unido', 'República Checa', 'Rumanía', 'Rusia',
                                'San Marino', 'Suecia', 'Suiza', 'Turquía', 'Ucrania', 'Serbia'];
                            foreach ($countries as $value) {
                                if($value == ' - '){
                                    echo("<option value='.$value.' selected='selected' disabled>".$value.'</option>');
                                }else{
                                    echo('<option value='.$value.'>'.$value.'</option>');
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label id="nacimiento">Localidad</label><input class="form-control" type="text" value="{{ $usuario_direccion->country }}" name="city" placeholder="*" required><br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <label>Calle</label><input class="form-control" type="text" name="street" placeholder="Dirección exacta" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Número</label><input class="form-control" type="text" name="number" placeholder="*" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Bloque</label><input class="form-control" type="text" name="block" value="{{ old('email') }}">
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Planta</label><input class="form-control" type="text" name="floor" value="{{ old('email') }}">
                </div>
                <div class="col-md-2 col-sm-12">
                    <label>Puerta</label><input class="form-control" type="text" name="door" value="{{ old('email') }}">
                </div><br>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button id="btn-signup" class="bg-success btn mb-2 text-light text-center mt-3" type="submit">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endsection
