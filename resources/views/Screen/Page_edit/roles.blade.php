{{-- filepath: resources/views/User/Page_edit/roles.blade.php --}}
@extends('layouts.menu1') {{-- o layouts.app, según estés usando --}}
@section('container')
<div class="container">
    <h1>Listado de Roles</h1>
      <a href="{{ route('roles.create') }}" class="btn btn-success mb-3">Crear Nuevo Rol</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $i => $role)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> --}}
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