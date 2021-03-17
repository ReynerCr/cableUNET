@extends('layout')

@section('title', 'Compra de un paquete')

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

<section>
    <form method="POST" action="{{ route('client.packages.createId') }}">
        {{ csrf_field() }}
        <fieldset>
            <legend>
                <h1>Listado de paquetes</h1>
            </legend>

            <div class="mb-1">
                <label class="form-label" for="service_package_id">Seleccione un paquete</label>
                <select required class="form-select" id="service_package_id" name="service_package_id">
                    @foreach ($packages as $pack)
                    <option value="{{ $pack->id }}">{{ $pack->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Mostrar información de paquete</button>
        </fieldset>
    </form>
</section>

@isset($package)
<hr>
<section>
    <form method="POST" action="{{ route('client.packages.store') }}">
        {{ csrf_field() }}
        <fieldset>
            @include('packages.showinfo_package')
            <input type="hidden" name="service_package_id" value="{{ $package->id }}">
        </fieldset>
        <button type="submit" class="btn btn-primary">Adquirir paquete</button>
    </form>
</section>
@endisset

<a href="{{ route('client.home') }}" class="btn btn-link">Regresar al inicio</a>
@endsection
