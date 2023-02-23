@extends('template.templateUser')
@section('deliveries')
@php
    use App\Models\Adress;
@endphp
    <table class="table table-responsive table-bordered text-center bg5">
        <thead>
            <tr class="text-center bg-dark text-white">
                <th scope="col">REF</th>
                <th scope="col">Productos</th>
                <th scope="col">Precio total</th>
                <th scope="col">Dirección</th>
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
                    @php
                        $address = Adress::where('id', $delivery->adress_id)->first()
                    @endphp
                    <td>{{$address->country.', '.$address->city.', '.$address->street.', nº '.$address->number.', Edificio '.$address->building.
                        ', '.$address->floor.'  '.$address->door}}</td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
