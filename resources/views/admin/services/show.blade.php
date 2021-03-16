@extends('layout')
@section('title', "Mostrar datos de servicio")
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">
            Información del servicio de
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

        <p>Nombre del plan: {{ $service->name }}</p>
        @switch($type)

        @case(1) {{-- Internet --}}
        <p>Velocidad de descarga (Mbps): {{ $service->download_speed }}</p>
        <p>Velocidad de subida (Mbps): {{ $service->upload_speed }}</p>
        @break

        @case(2) {{-- Telephony --}}
        <p>Minutos: {{ $service->minutes }}</p>
        @break

        @case(3) {{-- cable TV --}}
        <p></p>
        @break

        @endswitch

        <p>Precio: {{ $service->price }}</p>

        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
        <a href="{{ route('admin.services.type.create', $type) }}" class="btn btn-link">Crear nuevo servicio</a>
    </div>
</div>
@endsection
