<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('titulo','ADMINISTRADOR')</title>

  <!-- Bootstrap y CoreUI -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui/dist/css/coreui.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

  <!-- Botón para mostrar el menú en móviles -->
  <button class="btn btn-dark d-md-none m-2" id="menuToggle">
    <i class="cil-menu"></i> Menú
  </button>

  <!-- Sidebar -->
  <div class="sidebar sidebar-dark bg-dark border-end d-none d-md-block" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <img src="{{ asset('images/logo_mobile.png') }}" alt="Logo" class="sidebar-logo">
        <p id="texto">Epidemiology System </p>
      </div>
    </div>

    <ul class="sidebar-nav">
      <li class="nav-title">{{ Auth::user()->name ?? 'Usuario' }}</li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('bienvenido') ? 'active' : '' }}" href="/bienvenido">
          <i class="nav-icon cil-home"></i> Inicio
        </a>
      </li>

      @can('listuser')
      <li class="nav-item">
     <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}" href="/permissions">
          <i class="nav-icon cil-lock-locked"></i> Permisos
        </a>
      </li>
      <li class="nav-item">
                     <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="/roles">

        {{-- <a class="nav-link" href="/roles"> --}}
          <i class="nav-icon cil-user"></i> Roles
        </a>
      </li>
      <li class="nav-item">
             <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="/users">

        {{-- <a class="nav-link" href="{{ route('users.index') }}"> --}}
          <i class="nav-icon cil-people"></i> Usuarios
        </a>
      </li>
      @endcan

      <li class="nav-item">
                     <a class="nav-link {{ request()->is('perfil*') ? 'active' : '' }}" href="/perfil">

        {{-- <a class="nav-link" href="/perfil"> --}}
          <i class="nav-icon cil-user"></i> Perfil
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('minsa-data*') ? 'active' : '' }}" href="/minsa-data">
          <i class="nav-icon cil-library"></i> Minsa
        </a>
      </li>

      <li class="nav-item mt-3">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-link nav-link text-start">
            <i class="nav-icon cil-account-logout"></i> Cerrar Sesión
          </button>
        </form>
      </li>
    </ul>

    <div class="sidebar-footer border-top d-flex justify-content-center">
      <button class="sidebar-toggler" type="button"></button>
    </div>
  </div>

  <!-- Contenido principal -->
  <div class="main-content p-3">
    @yield('container')

    <footer>
      {{-- &copy; System Epidemiologia - Todos los derechos reservados INNOVACIÓN Y DESARROLLO {{ now()->year }} --}}
    </footer>
  </div>
  
  <script src="{{ asset('js/script.js') }}"></script>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@stack('scripts')
</body>
</html>
