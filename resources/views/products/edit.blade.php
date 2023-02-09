@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar los productos --}}
    <h2>Editando el producto {{ $producto->id }}</h2>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    @error('name')
        <div class="alert alert-danger"> El nombre es obligatorio </div>
    @enderror

    @error('description')
        <div class="alert alert-danger"> La descripción es obligatoria </div>
    @enderror

    <form action="{{ route('products.update', $producto->id) }}" method="POST">
        @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
        <input type="text" name="name" class="form-control mb-2" value="{{ $producto->name }}" autofocus>
        <input type="text" name="description" class="form-control mb-2" value="{{ $producto->description }}">
        <input type="number" step="0.01" name="price" class="form-control mb-2" value="{{ $producto->price }}"
            autofocus>
        <div class="col-md-6 col-sm-12">
            <input class="form-control" type="date" name="date" value="{{ $producto->date }}" required>
        </div>
        <input type="checkbox" name="state" checked value="1">
        <input type="text" name="description" class="form-control mb-2" value="{{ $producto->description }}">

        <select name="category" class="form-select" id="multiple-select-field" data-placeholder="Choose anything" multiple>
            @foreach ($producto->categories as $cp)
                {{ $categoryProduct = $cp->id }}
            @endforeach
            @foreach ($categories as $category)
                <option @if ($category->id == $categoryProduct) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">Guardar cambios</button>
    </form>
@endsection
