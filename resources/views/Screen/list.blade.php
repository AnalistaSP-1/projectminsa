@extends('layouts.menu1')

@section('titulo')
LISTADO USUARIOS
@endsection

@section('container')
<h1>LISTADO DE USUARIOS</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Agregar Usuario</a>

<table class="table table-bordered">


        <tr>
            <th>ID</th>
            <th>Nombres y Apellidos</th>
                          <th>Dni</th>

            <th>Usuario</th>
            <th>Email</th>
         <th>cmp</th>
            <th>Activo</th>
                <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                 <td>{{ $usuario->document_number}}</td>
                <td>{{ $usuario->username}}</td>
                <td>{{ $usuario->email}}</td>
                <td>{{ $usuario->cmp}}</td>
                <td>{{ $usuario->active ? 'Si 🟢' : 'No 🔴' }}</td>
                 <td>
<a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
