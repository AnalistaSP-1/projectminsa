@extends('layouts.menu1')

@section('titulo')
LISTADO USUARIOS
@endsection

@section('container')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Correo:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" class="form-control" value="{{ $user->dni }}" required> 
        </div>

        <div class="mb-3">
            <label for="active">Activo:</label>
            <select name="active" class="form-control">
                <option value="1" {{ $user->active ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$user->active ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="role_id">Rol:</label>
            <select name="role_id" class="form-control">
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $user->role_id == $rol->id ? 'selected' : '' }}>
                        {{ $rol->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="clinics">Clínicas:</label>
            <select name="clinics[]" multiple class="form-control">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}" {{ $user->clinics->contains($clinic->id) ? 'selected' : '' }}>
                        {{ $clinic->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    
    </form>
</div>
@endsection
