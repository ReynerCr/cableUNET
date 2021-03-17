<h4>Nombre del paquete: {{ $package->name }}</h4>
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
        <li>Precio individual: {{ $package->telephony_service->price }}</li>
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
        {{-- Channel lists --}}
        <div class="mb-3">
            <p>Lista de canales:</p>
            <ul>
                @foreach ($package->cable_tv_service->channels as $channel)
                <li>{{ $channel->name }}</li>
                @endforeach
            </ul>
        </div>
    </ul>
</section>
@endisset
<p>Precio del paquete: {{ $package->price }}</p>
