<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login epidemiologia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- CSS personalizado -->
    <link href="{{ asset('css/appp.css') }}" rel="stylesheet" />
</head>
<body>    
        <div class="background-wrapper"></div>


    <!-- CONTENIDO (Formulario y logo) -->
    
    <div class="login-container">
        <div class="login-form">
<div class="row align-items-center">
  <div class="col-md-7">
            <h2 style="color: black">IDENTIFICARSE</h2>

            {{-- Mostrar errores --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('authentification') }}">
                @csrf

                {{-- Sede --}}
                <div class="form-group mb-3">
                    <label for="sedeId">Sede</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <select name="sedeId" id="sedeId" class="form-select" required>
                            <option value="" disabled selected>Seleccione una sede</option>
                            @foreach ($sedes as $id => $nombre)
                                <option value="{{ $id }}" {{ old('sedeId') == $id ? 'selected' : '' }}>
                                    {{ $nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Usuario --}}
                <div class="form-group mb-3">
                    <label for="username">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required autofocus />
                    </div>
                </div>

                {{-- Contraseña --}}
                <div class="form-group mb-3">
                    <label for="password">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Ingrese contraseña" />
                    </div>
                </div>

                {{-- Botón --}}
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-mi-color">Ingresar</button>
                </div>
                
          
            </form>
             
        </div>
         <div class="col-md-5 d-none d-md-block">
      <div class="form-right h-100 text-center pt-5 align-middle">
        <img src="{{ asset('images/logo_mobile.png') }}" class="mt-5" alt="">
      </div>
            
    
    </div>
    
</body>

