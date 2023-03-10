@extends('template.templateAdmin')
@section('deliveries')
    {{-- Primera vista del admin: mostrar_productos() --}}

    <div class="px-5 mt-4">
        <div class="pb-3">
            {{-- <button class="btn btn-success"><a class="text-decoration-none text-white" href="">Crear
                    usuario</a></button> --}}
        </div>
        <table class="table table-responsive table-bordered text-center bg5">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th scope="col">id</th>
                    <th scope="col">state</th>
                    <th scope="col">products</th>
                    <th scope="col">total</th>
                    <th scope="col">user_id</th>
                    <th scope="col">address_id</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($deliveries as $delivery)
                    <tr class="align-middle">
                        <th scope="row">{{ $delivery->id }}</th>
                        <td>{{ $delivery->state }}</td>
                        <td class="text-start">
                            <ul>
                                {{-- TODO: MEJORAR FRONT --}}
                                @foreach ($delivery->products as $product)
                                    <li>{{ $product->name }} {{ $product->price }}€ Cantidad: {{ $product->pivot->amount }}
                                        Subtotal: {{ $product->price * $product->pivot->amount }}€
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $delivery->total }}€</td>
                        <td>{{ $delivery->user_id }}</td>
                        <td>{{ $delivery->adress_id }}</td>
                        <td class=" text-center">
                            <form action="{{ route('deliveries.delete', $delivery) }}" method="POST" class="d-inline">
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
        <div>{{ $deliveries->links() }}</div>
    </div>

    </div>
@endsection
