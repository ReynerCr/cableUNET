@extends('layout')

@section('title', 'Iniciar sesión')

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

<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <fieldset>
        <legend>
            <h1>Iniciar sesión:</h1>
        </legend>
        <div class="mb-1">
            <div class="mb-1">
                <label class="form-label" for="email">Correo electrónico: </label>
                <input class="form-control" type="email" placeholder="prueba@ejemplo.com" maxlength="50" id="email"
                    name="email" required value={{ old('email') }}><br>
            </div>
            <div class="mb-1">
                <label for="password">Contraseña: </label>
                <input class="form-control" type="password" placeholder="Entre 6 y 16 caracteres" id="password"
                    name="password" required><br>
            </div>

            <div class="mb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Recuérdame
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </fieldset>
</form>
@endsection
