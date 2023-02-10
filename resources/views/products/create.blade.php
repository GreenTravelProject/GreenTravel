@extends('template.templateAdmin')
@section('edit')
    {{-- Vista para editar los productos --}}

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
    {{-- TODO: ERRORES ?? --}}

    <section class="container p-5 my-3 adminForm">
        <h2>Crear nuevo producto</h2>
        <form action="" method="POST">
            @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}


            <div class="d-grid">
                <div class="row p-2 py-md-3">
                    <div class="col-md-5">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" placeholder = "Nombre del producto" autofocus>
                    </div>
                    <div class="col-md-2">
                        <label for="price">Precio: </label>
                        <input type="number" step="0.01" name="price" placeholder = "0.00" class="form-control" autofocus>
                    </div>
                    <div class="col-md-5">
                        <label for="date">Fecha: </label>
                        <input class="form-control" type="date" name="date" required>
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-10">
                        <label for="description">Descripción: </label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <label for="state" class="p-3">Estado:</label>
                        <input type="checkbox" name="state" id="state" checked value="1">
                    </div>
                </div>
                <div class="row p-2 py-md-3">
                    <div class="col-md-3">
                        <label for="stock">Stock: </label>
                        <input type="number" name="stock" class="form-control" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="img">Imagen: </label>
                        <input type="text" name="img" class="form-control" autofocus>
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
                                    <input type="checkbox" id="{{ $category->name }}" name="category[]"></input></label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button class="btn btn-success m-2" type="submit">Guardar cambios</button>

        </form>
    </section>
    <script>
        {{-- TODO: ¿POR QUÉ NO LEE JAVASCRIPT???? --}}
        let expanded = false;

        function showCheckboxes() {
            let checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>
@endsection
