@extends('layout')

@section('title', "Datos de suscripción")

@section('content')
<div class="card">
    <div class="card-body">
        <section>
            <h1 class="card-title">Información de la suscripción</h1>
            @include('packages.showinfo_package')
        </section>
        <section>
            <h4>Información del suscriptor</h4>
            <ul>
                <li>Nombres y apellidos: {{ $user->name.' '.$user->surname }}</li>
                <li>C.I: V {{ $user->id_card }}</li>
                <li>Correo electrónico: {{ $user->email }}</li>
                <li>Número de teléfono: {{ $user->phone_number }}</li>
            </ul>
            <p>Fecha de compra: {{ $subscription->created_at }}</p>
        </section>
        <a href="{{ route('admin.home') }}" class="btn btn-link">Regresar al panel de administración</a>
    </div>
</div>
@endsection
