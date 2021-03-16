@extends('layout')

@section('title', 'Página principal')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Bienvenido {{ Auth::user()->name .' '. Auth::user()->surname }} al sistema en línea de
            CableUNET</h2>
        <a href="" class="card-link">Adquirir un paquete de servicios</a>
        <a href="" class="card-link">Pedir un cambio de paquete de servicios</a>
        <a href="" class="card-link">Ver facturas mensuales</a>
        <a href="{{ route('client.id.edit', Auth::user()->id) }}" class="card-link">Ver o editar información de
            usuario</a>
    </div>
</div>
@endsection
