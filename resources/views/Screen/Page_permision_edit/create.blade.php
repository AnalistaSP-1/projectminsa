@extends('layouts.menu1')
 @section('titulo')
@endsection
@section('container')
<div class="container">
    <h2>Crear Permiso</h2>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre del Permiso</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
 <footer>
      &copy; System Epidemiologia - Todos los derechos reservados INNOVACIÓN Y DESARROLLO {{ now()->year }}
    </footer>
@endsection
