@extends('template.templateAdmin')
@section('users')
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Género</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Email</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                    <tr class="align-middle">
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>{{ $user->genre }}</td>
                        <td>{{ $user->admin }}</td>
                        <td>{{ $user->email }}</td>

                        <td class=" text-center"><a href="{{ route('users.edit', $user->id) }}" class="text-success"><i
                                    class="bi bi-pencil-fill"></i></a></td>
                        <td class=" text-center">
                            <form action="{{ route('users.delete', $user) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $users->links() }}</div>
    </div>

    </div>
@endsection
