@extends('template.templateAdmin')
@section('users')
    {{-- Primera vista del admin: mostrar_productos() --}}

    <div class="px-5 mt-4">
        <div class="pb-3">
            <button class="btn btn-success"><a class="text-decoration-none text-white"
                    href="{{ route('categories.create') }}">Crear
                    categoría</a></button>
        </div>
        <table class="table table-responsive table-bordered text-center bg5">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($categories as $category)
                    <tr class="align-middle">
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="td-img"><img class="img-admin" src="{{ URL::asset("img/$category->img") }}"></td>

                        <td class=" text-center"><a href="{{ route('categories.edit', $category->id) }}"
                                class="text-success"><i class="bi bi-pencil-fill"></i></a></td>
                        <td class=" text-center">
                            <form action="{{ route('categories.delete', $category) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
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
        </div>
       <div>{{ $categories->links() }}</div>
    </div>

    </div>
@endsection
