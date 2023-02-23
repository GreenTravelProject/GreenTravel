@extends('template.templateAdmin')
@section('products')
    {{-- Primera vista del admin: mostrar_productos() --}}
    @if (session('mensaje'))
        {{ session('mensaje') }}
    @endif
    <div class="px-5 mt-4">
        <div class="pb-3">
            <button class="btn btn-success"><a class="text-decoration-none text-white"
                    href="{{ route('products.create') }}">Crear producto</a></button>
        </div>
        <table class="table table-responsive table-bordered text-center bg5">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">date</th>
                    <th scope="col">state</th>
                    <th scope="col">stock</th>
                    <th scope="col">img</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($productos as $product)
                    <tr class = "align-middle">
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>
                            @foreach ($product->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </td>
                        <td>{{ substr($product->description, 0, 50) }}...</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->date }}</td>
                        <td>{{ $product->state }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="td-img"><img class="img-admin" src="{{ URL::asset("img/products/$product->img") }}"></td>
                        <td class=" text-center"><a href="{{ route('products.edit', $product->id) }}"
                                class="text-success"><i class="bi bi-pencil-fill"></i></a></td>
                        <td class=" text-center">
                            <form action="{{ route('products.delete', $product) }}" method="POST" class="d-inline">
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
        <div>{{ $productos->links() }}</div>
    </div>
@endsection
