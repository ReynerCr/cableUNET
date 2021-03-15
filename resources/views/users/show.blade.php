@extends('layout')

@section('title', "Mostrar datos de usuario")

@section('content')

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Información del usuario con id {{ $user->id }}</h1>
            <p>Nombres: {{ $user->name }}</p>
            <p>Apellidos: {{ $user->surname }}</p>
            <p>C.I: V {{ $user->id_card }}</p>
            <p>Correo electrónico: {{ $user->email }}</p>
            <p>Número de teléfono: {{ $user->phone_number }}</p>
            @if ($user->isAdmin())
                <p>Es administrador</p>
            @endif
            <a href="{{ route('admin.users') }}" class="card-link">Regresar al listado de usuarios</a>
            <a href="{{ route('admin.users.id.edit', $user) }}" class="card-link">Editar</a>
        </div>
    </div>
@endsection
