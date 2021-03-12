@extends('layout')

@section('title', 'Editar usuario')

@section('content')
    <h1>Editar usuario con id {{ $user->id }}.</h1>
    <p>Nombres: {{ $user->name }}.</p>
    <p>Apellidos: {{ $user->surname }}.</p>
    <p>C.I: V{{ $user->id_card }}.</p>
@endsection
