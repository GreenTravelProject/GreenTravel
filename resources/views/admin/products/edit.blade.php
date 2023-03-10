@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar los productos --}}

    <section class="container p-5 my-3 adminForm">
        <h2>Editando el producto {{ $producto->id }}</h2>
        <form action="{{ route('products.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-5">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" value="{{ $producto->name }}" required
                            autofocus>
                    </div>
                    <div class="col-md-2">
                        <label for="price">Precio: </label>
                        <input type="number" min = "0" step="0.01" name="price" id="price" class="form-control"
                            value="{{ $producto->price }}" autofocus required onchange="priceInDecimal(this)">
                    </div>
                    <div class="col-md-5">
                        <label for="date">Fecha: </label>
                        <input class="form-control" type="date" name="date" value="{{ $producto->date }}" required>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-10">
                        <label for="description">Descripción: </label>
                        <textarea name="description" class="form-control" placeholder="Descripción del producto" required>{{ $producto->description }}</textarea>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <label for="state" class="p-3">Estado:</label>
                        <input type="checkbox" name="state" id="state" {{ $producto->state == 1 ? 'checked' : '' }}
                            value="1">
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-3">
                        <label for="stock">Stock: </label>
                        <input type="number" min = "0" name="stock" class="form-control" required value="{{ $producto->stock }}"
                            placeholder="1" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="img">Imagen: </label>
                        <input type="file" name="img" class="form-control" autofocus required>
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
                                        {{ $producto->categories->contains($category->id) ? 'checked=true' : '' }}></label>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif
                <button class="btn btn-success m-2" type="submit">Guardar cambios</button>

        </form>
    </section>
@endsection
