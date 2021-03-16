@extends('layout')

@section('title', 'Creación de servicio')

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

<form method="POST" action="{{ route('admin.services.type.store', $type) }}">
    {{ csrf_field() }}
    <fieldset>
        <legend>
            <h1>
                Crear un servicio de
                @switch($type)
                @case(1)
                {{ 'Internet' }}
                @break
                @case(2)
                {{ 'telefonía' }}
                @break
                @case(3)
                {{ 'televisión por cable' }}
                @break
                @endswitch
            </h1>
        </legend>
        <div class="mb-1">
            <label class="form-label" for="name">Nombre del plan: </label>
            <input class="form-control" type="text" placeholder="ilimitado" maxlength="30" id="name" name="name"
                required value={{ old('name') }}><br>
        </div>

        @switch($type)
        {{-- Internet service --}}
        @case(1)
        <div class="mb-1">
            <label class="form-label" for="download_speed">Velocidad de descarga (Mbps): </label>
            <input class="form-control" type="number" min="0.1" step="0.1" placeholder="10" id="download_speed"
                name="download_speed" required value={{ old('download_speed') }}><br>
        </div>
        <div class="mb-1">
            <label class="form-label" for="upload_speed">Velocidad de subida (Mbps): </label>
            <input class="form-control" type="number" min="0.1" step="0.1" placeholder="1" id="upload_speed"
                name="upload_speed" required value={{ old('upload_speed') }}><br>
        </div>
        @break
        {{-- Telephony service --}}
        @case(2)
        <div class="mb-1">
            <label class="form-label" for="minutes">Minutos: </label>
            <input class="form-control" min="1" type="number" placeholder="100" id="minutes" name="minutes" required
                value={{ old('minutes') }}><br>
        </div>
        @break
        {{-- Cable TV service --}}
        @case(3)
        <noscript class="alert alert-danger">
            <p>Se requiere JavaScript para poder cargar canales al crear servicio de tv por cable.</p>
        </noscript>

        <div class="mb-1">
            {{-- Generating channel list  --}}
            <div class="d-flex">
                <select class="form-select" id="select_channel">
                    @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @endforeach
                </select>
                <button id="add_channel" type="button" class="btn btn-secondary">Agregar</button>
            </div>
            <ul id="channel_list">
            </ul>
        </div>
        <!-- Add the script for functionality -->
        <script type="application/javascript" src="/js/addchannels.js"></script>
        @break
        @endswitch

        <div class="mb-1">
            <label class="form-label" for="price">Precio: </label>
            <input class="form-control" type="number" placeholder="129.99" id="price" name="price" required
                value={{ old('price') }}><br>
        </div>
        <button type="submit" class="btn btn-primary">Crear servicio</button>
        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
    </fieldset>
</form>

@endsection
