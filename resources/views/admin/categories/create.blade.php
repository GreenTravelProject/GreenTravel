@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para crear las categorías --}}
    <section class="container p-5 my-3 adminForm">
        <h2>Crear nueva categoría</h2>
        <form action="{{ route('categories.insert') }}" method="POST">
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}"
                            autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Descripción: </label>
                        <input type="text" name="description" class="form-control" value="{{ old('name') }}" required
                            autofocus>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <label for="img">Imagen: </label>
                    <input type="text" name="img" class="form-control" placeholder="deportes.jpg" autofocus>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <button class="btn btn-success m-2" type="submit">Guardar cambios</button>
            </div>
        </form>
    </section>
@endsection
