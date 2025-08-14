@extends('layouts.menu1') {{-- o layouts.app, según estés usando --}}
@section('container')
<div class="container">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Permisos</label>
            <div class="row">
                @foreach($permission as $perm)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $perm->name }}"
                                id="perm{{ $perm->id }}"
                                {{ in_array($perm->id, array_keys($rolePermissions)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm{{ $perm->id }}">{{ $perm->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection