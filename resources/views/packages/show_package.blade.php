@extends('layout')

@section('title', "Mostrar datos de paquete")

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Información del paquete de servicios</h1>

        @include('packages.showinfo_package')

        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-link">Crear nuevo paquete de servicios</a>
    </div>
</div>
@endsection
