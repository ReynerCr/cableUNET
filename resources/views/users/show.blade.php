@extends('layout')

@section('title', "Mostrar datos de usuario")

@section('content')
    <h1>Información del usuario con id {{ $user->id }}</h1>
    <p>Nombre del usuario: {{ $user->name .' '. $user->surname }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>
    <p>C.I: V {{ $user->id_card }}</p>

    <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
    <a href="{{ route('users.edit', $user) }}">Editar usuario</a>
@endsection
