@extends('layout')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <hr>

    <ul>
        @forelse ($users as $user)
            <li>
                {{ $user->id }}: {{ $user->name }} {{ $user->surname }}, {{ $user->email }}
                <a href="{{ route('users.show', ['user' => $user->id]) }}">Ver detalles</a>
            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection
