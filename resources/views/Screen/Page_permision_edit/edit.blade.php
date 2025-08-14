@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Permiso</h2>

    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre del Permiso</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
