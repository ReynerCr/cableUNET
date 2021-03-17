@extends('layout')

@section('title', 'Página principal')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Bienvenido {{ Auth::user()->name .' '. Auth::user()->surname }} al sistema en línea de
            CableUNET</h2>
        <ul>
            <li><a href="{{ route('client.packages.create') }}" class="btn btn-link">Adquirir un paquete de servicios</a></li>
            <div class="card">
                <p>No implementado</p>
                <li><a href="" class="btn btn-link">Pedir un cambio de paquete de servicios</a></li>
                <li><a href="" class="btn btn-link">Ver facturas mensuales</a></li>
            </div>
            <li><a href="{{ route('client.id.show', Auth::user()->id) }}" class="btn btn-link">Ver información de
                    usuario</a></li>
            <li><a href="{{ route('client.id.edit', Auth::user()->id) }}" class="btn btn-link">Editar información de
                    usuario</a></li>
        </ul>
    </div>
</div>
@endsection
