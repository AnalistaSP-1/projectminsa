@extends('layouts.menu1')

@section('titulo')
LISTADO USUARIOS
@endsection

@section('container')
    <h2>Registrar Nuevo Usuario</h2>

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

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input id="name" type="text" name="name" class="form-control" required>
        </div>

         <div class="form-group">
            <label for="username">Usuario:</label>
            <input id="username" type="text" name="username" class="form-control" required>
        </div>
  <div class="form-group">
    <label for="document_number">Número de Documento:</label>
    <input id="document_number" type="text" name="document_number" class="form-control" required>
</div>


     

        <div class="form-group">
            <label for="email">Correo:</label>
            <input id="email" type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cmp">CMP:</label>
            <input id="cmp" type="text" name="cmp" class="form-control">
        </div>

        <div class="form-group">
            <label for="active">Activo:</label>
            <select id="active" name="active" class="form-control">
                <option value="1">Sí</option>
                <option value="0">No</option>
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

    <label for="role_id">Rol:</label>
    <select id="role_id" name="role_id" class="form-control" required>
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-success mt-3">Guardar Usuario</button>
    </form>
    </div>
    
    @endsection



{{-- 
[Vista Blade: users.create]
         |
         v
[Usuario llena el formulario]
         |
         v
[Se envía POST a 'users.store' → UserController@store]
         |
         v
[Laravel valida los datos]
         |
         v
[Se guarda en tabla 'users']
         |
         v
[Se guarda relación en tabla 'epidocs_clinics' (clinics asociadas)]
         |
         v
[Redirecciona a listado de usuarios con mensaje: "Usuario creado correctamente"] --}}
