@extends('layouts.menu1')

@section('titulo')
LISTADO USUARIOS
@endsection

@section('container')
<div class="container">
    <h1>Lista de Permisos</h1>

    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Crear nuevo permiso</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Guard</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este permiso?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
 <footer>
      &copy; System Epidemiologia - Todos los derechos reservados INNOVACIÓN Y DESARROLLO {{ now()->year }}
    </footer>
@endsection
