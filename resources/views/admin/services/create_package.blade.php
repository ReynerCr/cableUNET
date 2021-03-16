@extends('layout')

@section('title', 'Creación de paquete de servicios')

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

<form method="POST" action="{{ route('admin.packages.store') }}">
    {{ csrf_field() }}
    <fieldset>
        <legend>
            <h1>Crear un paquete de servicios para la venta</h1>
        </legend>

        <div class="mb-1">
            <label class="form-label" for="name">Nombre del paquete: </label>
            <input class="form-control" type="text" placeholder="ilimitado" maxlength="30" id="name" name="name"
                required value={{ old('name') }}><br>
        </div>
        {{-- Internet service --}}
        <div class="mb-1">
            <label class="form-label" for="internet_service_id">Plan de Internet </label>
            <select required class="form-select" id="internet_service_id" name="internet_service_id">
                <option value="" hidden disabled selected>nombre - precio</option>
                <option value="">No se incluye</option>

                @foreach ($internetlist as $internet)
                <option value="{{ $internet->id }}">{{ $internet->name.' - '.$internet->price.''  }}</option>
                @endforeach
            </select>
        </div>
        {{-- Telephony service --}}
        <div class="mb-1">
            <label class="form-label" for="telephony_service_id">Plan de telefonía </label>
            <select required class="form-select" id="telephony_service_id" name="telephony_service_id">
                <option value="" hidden disabled selected>nombre - precio</option>
                <option value="">No se incluye</option>

                @foreach ($telephonylist as $telephony)
                <option value="{{ $telephony->id }}">{{ $telephony->name.' - '.$telephony->price.'' }}</option>
                @endforeach
            </select>
        </div>
        {{-- Cable TV service --}}
        <div class="mb-1">
            <label class="form-label" for="cable_tv_service_id">Plan de TV cable: </label>
            <select required class="form-select" id="cable_tv_service_id" name="cable_tv_service_id">
                <option value="" hidden disabled selected>nombre - precio</option>
                <option value="">No se incluye</option>

                @foreach ($cablelist as $cable)
                <option value="{{ $cable->id }}">{{ $cable->name.' - '.$cable->price.''  }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-1">
            <label class="form-label" for="price">Precio: </label>
            <div class="d-flex">
                <input required class="form-control" type="number" placeholder="129.99" id="price" name="price"
                    value={{ old('price') }}><br>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear paquete de servicios</button>
        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
    </fieldset>
</form>
@endsection
