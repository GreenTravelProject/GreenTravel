@extends('template.templateUser')
@section('deliveries')
    <table class="table table-responsive table-bordered text-center bg5">
        <thead>
            <tr class="text-center bg-dark text-white">
                <th scope="col">REF</th>
                <th scope="col">products</th>
                <th scope="col">total</th>
                <th scope="col">address_id</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($deliveries as $delivery)
                <tr class="align-middle">
                    <td>{{ $delivery->id }}</td>
                    <td class="text-start">
                        <ul>
                            @foreach ($delivery->products as $product)
                                <li>{{ $product->name }} {{ $product->price }}€ Cantidad: {{ $product->pivot->amount }}
                                    Subtotal: {{ $product->price * $product->pivot->amount }}€
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $delivery->total }}€</td>
                    <td>{{ $delivery->address_id }}</td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
