@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar los productos --}}
    @if (session('errors'))
        <div class="alert alert-danger">
            {{-- TODO: HAY QUE MODIFICAR LOS ERRORES --}}
            {{ session('errors') }}
        </div>
    @endif

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <section class="container p-5 my-3 adminForm">
        <h2>Editando el producto {{ $producto->id }}</h2>
        <form action="{{ route('products.update', $producto->id) }}" method="POST">
            @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-5">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" value="{{ $producto->name }}" autofocus>
                    </div>
                    <div class="col-md-2">
                        <label for="price">Precio: </label>
                        <input type="number" step="0.01" name="price" class="form-control"
                            value="{{ $producto->price }}" autofocus>
                    </div>
                    <div class="col-md-5">
                        <label for="date">Fecha: </label>
                        <input class="form-control" type="date" name="date" value="{{ $producto->date }}" required>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-10">
                        <label for="description">Descripción: </label>
                        <textarea name="description" class="form-control" placeholder = "Descripción del producto">{{ $producto->description }}</textarea>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <label for="state" class="p-3">Estado:</label>
                        <input type="checkbox" name="state" id="state" checked value="1">
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-3">
                        <label for="stock">Stock: </label>
                        <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}"  placeholder = "1" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="img">Imagen: </label>
                        <input type="text" name="img" class="form-control" value="{{ $producto->img }}"
                            placeholder="producto1.jpg" autofocus>
                    </div>
                    <div class="col-md-3">
                        <label for="select">Categorías:</label>
                        <div class="selectBox position-relative" onclick="showCheckboxes()">
                            <select class="w-100 form-select" name="select" id="select">
                                <option value="">Selecciona las categorías</option>
                            </select>
                            <div class="overSelect position-absolute"></div>
                        </div>

                        <div id="checkboxes" name="categories">
                            @foreach ($categories as $category)
                                <label class="d-flex py-1 px-3 gap-2" for="{{ $category->name }}">{{ $category->name }}
                                    <input type="checkbox" id="{{ $category->name }}" name="category[]"
                                        value="{{ $category->id }}"
                                        {{ $producto->categories->contains($category->id) ? 'checked=true' : 'checked=false' }}></input></label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="btn btn-success m-2" type="submit">Guardar cambios</button>

        </form>
    </section>
@endsection
