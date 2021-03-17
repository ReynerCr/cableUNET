@extends('layout')

@section('title', 'Administracion')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Bienvenido {{ Auth::user()->name .' '. Auth::user()->surname }} al sistema de
            administración de CableUNET</h2>
        {{-- Show errors if any --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <ul>
            <li>
                <div>
                    <h5 class="card-subtitle">Creación un servicio:</h5>
                    <ul>
                        <li><a href="{{ route('admin.services.type.create', 1) }}" class="btn btn-link">Internet</a>
                        </li>
                        <li><a href="{{ route('admin.services.type.create', 2) }}" class="btn btn-link">Telefonía</a>
                        </li>
                        <li><a href="{{ route('admin.services.type.create', 3) }}" class="btn btn-link">TV cable</a>
                        </li>
                        <ul>
                </div>
            </li>
            <li><a class="btn btn-link" href="{{ route('admin.packages.create') }}">Crear un paquete de servicios</a>
            </li>
            <li><a class="btn btn-link" href="{{ route('admin.services.channel.create') }}">Añadir canales de televisión
                    a la lista de
                    canales</a></li>
            <li><a class="btn btn-link" href="">NO IMPLEMENTADO Modificar programación por canal</a></li>
            <li><a class="btn btn-link" href="">Emitir facturas en el sistema</a></li>
            <li><a class="btn btn-link" href="">Revisión de solicitudes de cambio de plan</a></li>
            <li>Administración de <a class="btn btn-link" href="{{ route('admin.users') }}">usuarios</a> o <a
                    class="btn btn-link" href="{{ route('admin.users') }}">administradores</a></li>
        </ul>
    </div>
</div>
@endsection
