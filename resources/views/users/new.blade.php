@extends('layout')

@section('title', 'Crear nuevo usuario')

@section('content')
<h1>Crear nuevo usuario: </h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('users.create') }}">
    {{ csrf_field() }}
    <label for="name">Nombres: </label>
    <input type="text" placeholder="Juan Pedro" maxlength="100" id="name" name="name" required value = {{ old('name') }}><br>

    <label for="surname">Apellidos: </label>
    <input type="text" placeholder="Perez Toledo" maxlength="100" id="surname" id="surname" required name="surname" value = {{ old('surname') }}><br>

    <label for="id_card">Cédula de identidad: </label>
    <input type="number" placeholder="V.-12345678" maxlength="9" id="id_card" name="id_card" required value = {{ old('id_card') }}><br>

    <label for="email">Correo electrónico: </label>
    <input type="email" placeholder="prueba@ejemplo.com" maxlength="50" id="email" name="email" required value = {{ old('email') }}><br>

    <label for="password">Contraseña: </label>
    <input type="password" placeholder="Entre 6 y 16 caracteres" id="password" name="password" required><br>

    <label for="phone_number">Teléfono: </label>
    <input type="tel" placeholder="1234-567-8910" id="phone_number"
        name="phone_number" required value = {{ old('phone_number') }}><br>

    <label for="address">Dirección </label>
    <textarea rows="4" cols="50" placeholder="Ingrese aquí su dirección." id="address" name="address" required>{{ old('address') }}</textarea><br>
    <button type="submit">Crear usuario</button>
</form>
<a href="{{ route('users') }}">Regresar al listado de usuarios</a>
@endsection
