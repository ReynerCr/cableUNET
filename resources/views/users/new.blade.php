@extends('layout')

@section('title', 'Crear usuario')

@section('content')
<h1>Crear nuevo usuario: </h1>

<form method="POST" action="{{ url('usuarios/registrar') }}">
    {{ csrf_field() }}
    <label for="name">Nombres: </label>
    <input type="text" required placeholder="Juan Pedro" maxlength="100" id="name" name="name"><br>

    <label for="surname">Apellidos: </label>
    <input type="text" required placeholder="Perez Toledo" maxlength="100" id="surname" id="surname" name="surname"><br>

    <label for="id_card">Cédula de identidad: </label>
    <input type="number" required placeholder="V.-12345678" maxlength="9" id="id_card" name="id_card"><br>

    <label for="email">Correo electrónico: </label>
    <input type="email" required placeholder="prueba@ejemplo.com" maxlength="50" id="email" name="email"><br>

    <label for="password">Contraseña: </label>
    <input type="password" required placeholder="Mayor a 6 caracteres" id="password" name="password"><br>

    <label for="phone_number">Teléfono: </label>
    <input type="tel" required placeholder="1234-567-8910" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" id="phone_number" name="phone_number"><br>

    <label for="address">Dirección </label>
    <textarea rows="4" cols="50" placeholder="Ingrese aquí su dirección." id="address" name="address"></textarea><br>
    <button type="submit">Crear usuario</button>
</form>
<a href="{{ route('users') }}">Regresar al listado de usuarios</a>
@endsection
