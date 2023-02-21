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
                    <th scope="col">user_id</th>
                    <th scope="col">address_id</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($deliveries as $delivery)
                    <tr class="align-middle">
                        <th scope="row">{{ $delivery->id }}</th>
                        <td>{{ $delivery->state }}</td>
                        <td>{{ $delivery->user_id }}</td>
                        <td>{{ $delivery->address_id }}</td>
                        <td class=" text-center"><a href="{{ route('deliveries.edit', $delivery->id) }}"
                                class="text-success"><i class="bi bi-pencil-fill"></i></a></td>
                        <td class=" text-center">
                            <form action="{{ route('deliveries.delete', $delivery) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{--<div>{{ $deliveries->links() }}</div>--}}
    </div>

    </div>
@endsection
