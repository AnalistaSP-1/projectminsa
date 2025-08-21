@extends('layouts.menu1')

@section('titulo')
CREAR USUARIO
@endsection

@section('container')
    <h2>Crear Usuario</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
      </ul>
    </div>
@endif
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="username">Usuario:</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Correo:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        {{-- <div class="mb-3">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div> --}}

        <div class="mb-3">
            <label for="document_number">DNI:</label>
            <input type="text" name="document_number" class="form-control" value="{{ old('document_number') }}" required>
        </div>

        <div class="mb-3">
            <label for="cmp">CMP:</label>
            <input type="text" name="cmp" class="form-control" value="{{ old('cmp') }}">
        </div>

        <div class="form-group">
            <label for="active">Activo:</label>
            <select name="active" class="form-control">
                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>
    <div class="form-group">
            <label for="clinics">Clinica Asociadas:</label>
            <select id="clinics" name="clinics[]" class="form-control" multiple required>
                @foreach ( $clinics as $clinic )
                    <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                @endforeach
            </select>
<small class='form-text text-muted'>Mantén presionada la tecla Ctrl (o Cmd en Mac) para seleccionar múltiples clínicas.</small>
        </div>        
<div class="form-group">
            <label for="password">Contraseña:</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>
<div class="form-group">
    <label for="password_confirmation">Confirmar Contraseña:</label>
    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
</div>
<div class="form-group">
        <div class="mb-3">

            <label for="role">Rol:</label>
            <select name="role" class="form-control">
                @foreach ($roles as $rol)
                    <option value="{{ $rol->name }}" {{ old('role') == $rol->name ? 'selected' : '' }}>
                        {{ $rol->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Si quieres clínicas, agrega aquí el select múltiple --}}

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<footer>
      &copy; System Epidemiologia - Todos los derechos reservados INNOVACIÓN Y DESARROLLO {{ now()->year }}
    </footer>
@endsection