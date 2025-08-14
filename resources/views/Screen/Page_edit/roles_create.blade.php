{{-- filepath: resources/views/User/Page_edit/roles_create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Rol</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Permisos</label>
            <div class="row">
                @foreach($permission as $perm)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $perm->id }}" id="perm{{ $perm->id }}">
                            <label class="form-check-label" for="perm{{ $perm->id }}">{{ $perm->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection