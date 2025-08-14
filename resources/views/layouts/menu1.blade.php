<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<!--TITULO PIE DE PAGINA -->
    <title>@yield('titulo','ADMINISTRADOR')</title>
    <!-- (Opcional) Bootstrap para estilos bonitos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MiApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/bienvenido">Inicio</a>
                    </li>

                          @can('listuser')



                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/permisos">Permisos</a>
                    </li>
                    @endcan

              @can('listuser')
    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/roles">Roles</a>
                    </li>
@endcan
                  

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="/perfil">Perfil</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="/minsa-data">Minsa</a>
                    </li>
              {{-- @can('listuser')  --}}
              @can('listuser')
                 <li class="nav-item">
                  <a class="nav-link active" 
                        aria-current="page" 
                        href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                    @endcan
                  {{-- @endcan --}} 
                 
                    <li class="nav-item ">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <h1>Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}</h1>
        <p>Esta es la página principal después de iniciar sesión xddddd.</p>
        @yield('container')
    </div>

    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
       &copy; System Epidemiologia -Todos los derechos reservado INNOVACION Y DESARROLLO
   
{{
    now() -> year 
}}    </footer>
    <!-- (Opcional) Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>
