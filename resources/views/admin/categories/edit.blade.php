@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar las categoría --}}

    <section class="container p-5 my-3 adminForm">
        <h2>Editando la categoría {{ $category->id }}</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-6">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required
                            autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="surname">Descripción: </label>
                        <input type="text" name="description" class="form-control" value="{{ $category->description }}"
                            required autofocus>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <label for="img">Imagen: </label>
                    <input type="text" name="img" class="form-control" value="{{ $category->img }}"
                        placeholder="deportes.jpg" autofocus>
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
