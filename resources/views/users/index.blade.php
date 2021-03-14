@extends('layout')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<hr>

<p>
    <a href="{{ route('users.new') }}">Agregar un nuevo usuario</a>
</p>

<ul>
    @forelse ($users as $user)
    <li>
        {{ $user->id }}: {{ $user->name }} {{ $user->surname }}, {{ $user->email }}
        <a href="{{ route('users.show', $user) }}">Ver detalles</a>
        <a href="{{ route('users.edit', $user) }}">Editar</a>
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Eliminar</button>
        </form>
    </li>
    @empty
    <li>No hay usuarios registrados.</li>
    @endforelse
</ul>
@endsection
