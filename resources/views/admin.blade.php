@extends('template.templateAdmin')
@section('welcomeAdmin')
    {{-- Primera vista del admin: mostrar_productos() --}}
    @if (session('mensaje'))
        {{ session('mensaje') }}
    @endif
    <div class="px-5 mt-4">
        <h1>Bienvenido de nuevo {{-- {{$admin->name}} --}} </h1>

    </div>
@endsection
