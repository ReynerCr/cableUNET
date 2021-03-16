@extends('layout')

@section('title', 'Administracion')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Bienvenido {{ Auth::user()->name .' '. Auth::user()->surname }} al sistema de
            administración de CableUNET</h2>
        <ul>
            <li>
                <div>
                    <h5>Creación un servicio:</h5>
                    <ul>
                        <li><a href="{{ route('admin.services.type.create', 1) }}" class="btn btn-link">Internet</a></li>
                        <li><a href="{{ route('admin.services.type.create', 2) }}" class="btn btn-link">Telefonía</a></li>
                        <li><a href="{{ route('admin.services.type.create', 3) }}" class="btn btn-link">TV cable</a></li>
                        <ul>
                </div>
            </li>
            <li><a href="">Crear un paquete de servicios</a></li>
            <li><a href="{{ route('admin.services.channel.create') }}">Añadir canales de televisión a la lista de canales</a></li>
            <li><a href="">Modificar programación por canal</a></li>
            <li><a href="">Emitir facturas en el sistema</a></li>
            <li><a href="">Revisión de solicitues de cambio de plan</a></li>
            <li>Administración de <a href="{{ route('admin.users') }}">usuarios</a> o <a
                    href="{{ route('admin.users') }}">administradores</a></li>
        </ul>
    </div>
</div>
@endsection
