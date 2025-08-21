@extends('layouts.menu1') {{-- o layouts.app, según estés usando --}}

@section('titulo')
LISTADO DE USUARIOS
@endsection

@section('container')
<div class="container">
    <h2>Listado de Usuarios</h2>

    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Crear Nuevo Usuario</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>DNI</th>
                <th>CMP</th>
                <th>Rol</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->document_number }}</td>
                    <td>{{ $user->cmp }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role)
                            <span class="badge bg-info text-dark">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->active ? '🟢​' : '🔴​​' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                           
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
