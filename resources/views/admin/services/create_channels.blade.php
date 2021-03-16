@extends('layout')

@section('title', 'Creación de canal')

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

<form method="POST" action="{{ route('admin.services.channel.store') }}">
    {{ csrf_field() }}
    <fieldset>
        <legend>
            <h1>Creación de canal</h1>
        </legend>
        <div class="mb-1">
            <label class="form-label" for="name">Nombre del canal: </label>
            <input class="form-control" type="text" placeholder="Fox" maxlength="30" id="name" name="name" required
                value={{ old('name') }}><br>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Descripción: </label>
            <textarea class="form-control" rows="3" cols="50" placeholder="Descripción de canal, máximo 150 caracteres"
                id="description" name="description" required>{{ old('description') }}</textarea><br>
        </div>
        <button type="submit" class="btn btn-primary">Crear canal</button>
        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
    </fieldset>
</form>
@endsection
