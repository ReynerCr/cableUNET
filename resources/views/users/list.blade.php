@extends('layout')

@section('title', 'Listado de usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-3">
    <h1>{{ 'Listado de usuarios' }}</h1>
    <p>
        <a href="{{ route('admin.users.new') }}" class="btn btn-primary">Agregar un nuevo usuario</a>
    </p>
</div>

@if ($users->isEmpty())
<p>No hay usuarios registrados.</p>
@else
<table class="table table-stripped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>

            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('admin.users.id.destroy', $user) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a href="{{ route('admin.users.id.show', $user) }}" class="btn btn-outline-primary">Ver detalles</a>
                    <a href="{{ route('admin.users.id.edit', $user) }}" class="btn btn-outline-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
