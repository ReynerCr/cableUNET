@extends('layout')

@section('title', 'Editar usuario')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <p>Se han detectado los siguientes errores:</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route($authprefix.'.id.show', $user) }}">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <fieldset>
        <legend>
            <h1>Editar usuario:</h1>
        </legend>
        <div class="mb-1">
            <label class="form-label" for="name">Nombres: </label>
            <input class="form-control" type="text" placeholder="Juan Pedro" maxlength="100" id="name" name="name"
                required value={{ old('name', $user->name) }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="surname">Apellidos: </label>
            <input class="form-control" type="text" placeholder="Perez Toledo" maxlength="100" id="surname"
                name="surname" required value={{ old('surname', $user->surname) }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="id_card">Cédula de identidad: </label>
            <input class="form-control" type="number" placeholder="V.-12345678" maxlength="9" id="id_card"
                name="id_card" required value={{ old('id_card', $user->id_card) }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="email">Correo electrónico: </label>
            <input class="form-control" type="email" placeholder="prueba@ejemplo.com" maxlength="50" id="email"
                name="email" required value={{ old('email', $user->email) }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="password">Contraseña: </label>
            <input class="form-control" type="password" placeholder="Entre 6 y 16 caracteres" id="password"
                name="password"><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="phone_number">Teléfono: </label>
            <input class="form-control" type="tel" placeholder="1234-567-8910" id="phone_number" name="phone_number"
                required value={{ old('phone_number', $user->phone_number) }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="address">Dirección </label>
            <textarea class="form-control" rows="4" cols="50" placeholder="Ingrese aquí su dirección." id="address"
                name="address" required>{{ old('address', $user->address) }}</textarea><br>
        </div>

        @if (Auth::user()->isAdmin() && !$user->isAdmin())
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" value="toAdmin" id="toAdmin" name="toAdmin">
            <label for="toAdmin">Hacer administrador</label>
        </div>
        @endif

        @if ($user->isAdmin())
        <p>Es un administrador.</p>
        <a href="{{ route($authprefix) }}" class="btn btn-link">Regresar al listado de usuarios</a>
        @endif
    </fieldset>
    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
</form>
@endsection
