@extends('layouts.menu1') {{-- o layouts.app, según estés usando --}}
@section('container')
<div class="container">
    <h1>Detalle del Rol</h1>
    <div class="mb-3">
        <strong>Nombre:</strong> {{ $role->name }}
    </div>
    <div class="mb-3">
        <strong>Permisos:</strong>
        <ul>
            @foreach($rolePermissions as $perm)
                <li>{{ $perm->name }}</li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
</div>
 <footer>
      &copy; System Epidemiologia - Todos los derechos reservados INNOVACIÓN Y DESARROLLO {{ now()->year }}
    </footer>
@endsection