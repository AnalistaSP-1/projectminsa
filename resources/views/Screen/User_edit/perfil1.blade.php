@extends('layouts.menu1')

@section('titulo')
PERFIL DE USUARIO
@endsection

@section('container')
<h1>Perfil del Usuario</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('perfil.update') }}" method="POST">
    @csrf
    @method('PUT')

    {{-- <div class="mb-3">
        <label for="name" class="form-label">Nombre Completo</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
    </div> --}}

    <div class="mb-3">
    <label for="cmp" class="form-label">Nombre Completo</label>
    <input type="text" name="cmp" id="cmp" value="{{ old('cmp', $user->name) }}" class="form-control" disabled>
</div>
   {{-- <div class="mb-3">
    <label for="cmp" class="form-label">Usuario</label>
    <input type="text" name="cmp" id="cmp" value="{{ old('cmp', $user->username) }}" class="form-control" disabled>
</div> --}}
    <div class="mb-3">
    <label for="cmp" class="form-label">Usuario</label>
    <input type="text" name="cmp" id="cmp" value="{{ old('cmp', $user->username) }}" class="form-control" disabled>
</div>


      <div class="mb-3">
    <label for="cmp" class="form-label">Correo electrónico</label>
    <input type="text" name="cmp" id="cmp" value="{{ old('cmp', $user->email) }}" class="form-control" disabled>
</div>

<div class="mb-3">
    <label for="document_number" class="form-label">DNI</label>
    <input type="text" name="document_number" id="document_number" value="{{ old('document_number', $user->document_number) }}" class="form-control" disabled>
</div>

 
    <div class="mb-3">
    <label for="cmp" class="form-label">CMP</label>
    <input type="text" name="cmp" id="cmp" value="{{ old('cmp', $user->cmp) }}" class="form-control" disabled>
</div>


    {{-- <button type="submit" class="btn btn-success">Actualizar Perfil</button> --}}
</form>
@endsection
