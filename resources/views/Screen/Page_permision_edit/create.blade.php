
@extends('layouts.app')

@section('content')
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
@endsection
