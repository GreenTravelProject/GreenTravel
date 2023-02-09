@extends('template.templateAdmin')
@section('products')
    {{-- Primera vista del admin: mostrar_productos() --}}
    <div class="px-5 mt-5">
        <table class="table table-responsive table-bordered text-center">
            <thead>
                <tr class="text-center">
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
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        @foreach ($product->categories as $category)
                            <td>{{ $category->name }}</td>
                        @endforeach
                        <td>{{ substr($product->description, 0, 50) }}...</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->date }}</td>
                        <td>{{ $product->state }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="td-img"><img class="img-admin" src="{{ URL::asset("img/$product->img") }}"></td>
                        <td class=" text-center"><a href="{{ route('products.edit', $product->id) }}"
                                class="text-success"><i class="bi bi-pencil-fill"></i></a></td>
                        <td class=" text-center"><a href="" class="text-danger text-center"><i
                                    class="bi bi-trash3-fill"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Esto es para que genere los botones de paginación (la paginación está en el ProductsController) --}}
        <div>{{ $productos->links() }}</div>
    </div>
@endsection
