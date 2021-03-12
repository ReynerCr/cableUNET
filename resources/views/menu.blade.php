<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">        
                <li class="nav-item"><a href="/usuarios" class="nav-link">Lista de suarios</a></li>
                <li class="nav-item"><a href="/usuarios?empty" class="nav-link">Lista de suarios vacía</a></li>
                <li class="nav-item"><a href="/usuarios/1" class="nav-link">Usuario 1</a></li>
                <li class="nav-item"><a href="/usuarios/100" class="nav-link">Usuario 100</a></li>
                <li class="nav-item"><a href="/usuarios/nuevo" class="nav-link">Nuevo usuario</a></li>
                <li class="nav-item"><a href="/usuarios/4/edit" class="nav-link">Editar usuario 4</a></li>
                <li class="nav-item"><a href="/saludo/reyner/reynercr" class="nav-link">Saludo nombre y apodo</a></li>
                <li class="nav-item"><a href="/saludo/reyner" class="nav-link">Saludo nombre</a></li> 
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>