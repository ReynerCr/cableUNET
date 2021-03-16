@extends('layout')
@section('title', "Mostrar datos de servicio")
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Información del paquete de servicios</h1>

        <p>Nombre del paquete: {{ $package->name }}</p>
        {{-- Internet --}}
        @isset($package->internet_service)
        <section>
            <h5 class="card-subtitle">Plan de Internet</h5>
            <ul>
                <li>Nombre del plan: {{ $package->internet_service->name }}</li>
                <li>Velocidad de descarga (Mbps): {{ $package->internet_service->download_speed }}</li>
                <li>Velocidad de subida (Mbps): {{ $package->internet_service->upload_speed }}</li>
                <li>Precio individual: {{ $package->internet_service->price }}</li>
            </ul>
        </section>
        @endisset
        {{-- Telephony --}}
        @isset($package->telephony_service)
        <section>
            <h5 class="card-subtitle">Plan de telefonía</h5>
            <ul>
                <li>Nombre del plan: {{ $package->telephony_service->name }}</li>
                <li>Minutos: {{ $package->telephony_service->minutes }}</li>
                <li>Precio individual: {{ $package->internet_service->price }}</li>
            </ul>
        </section>
        @endisset
        {{-- Cable TV --}}
        @isset($package->cable_tv_service)
        <section>
            <h5 class="card-subtitle">Plan de TV cable</h5>
            <ul>
                <li>Nombre del plan: {{ $package->cable_tv_service->name }}</li>
                <li>Precio individual: {{ $package->cable_tv_service->price }}</li>
                <ul>
                    {{-- Lista de canales --}}
                </ul>
            </ul>
        </section>
        @endisset
        <p>Precio del paquete: {{ $package->price }}</p>

        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-link">Crear nuevo paquete de servicios</a>
    </div>
</div>
@endsection
