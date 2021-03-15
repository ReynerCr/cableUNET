<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">CableUNET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @guest
                <!-- Guest links -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                </li>
                @else
                <!-- Links for auth users -->
                <li class="nav-item"><a href="/home" class="nav-link">Inicio</a></li>

                <!-- TODO INICIO LISTA TEMPORAL  -->
                @empty($authprefix)
                {{ $authprefix = Auth::user()->is_admin ? 'admin.users':'client' }}
                @endisset

                @if($authprefix == 'admin.users')
                <li class="nav-item"><a href="{{ route($authprefix) }}" class="nav-link">Lista</a></li>
                @endif
                <li class="nav-item"><a href="{{ route($authprefix.'.id.show', 3) }}" class="nav-link">show user</a>
                </li>
                <li class="nav-item"><a href="{{ route($authprefix.'.id.show', 7) }}" class="nav-link">show admin </a>
                </li>
                <li class="nav-item"><a href="{{ route($authprefix.'.id.edit', 3) }}" class="nav-link">edit user</a>
                </li>
                <li class="nav-item"><a href="{{ route($authprefix.'.id.edit', 7) }}" class="nav-link">edit admin</a>
                </li>
                <!-- TODO FIN LISTA TEMPORAL -->

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
