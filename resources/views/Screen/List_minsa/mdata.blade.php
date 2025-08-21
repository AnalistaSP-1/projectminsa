@extends('layouts.menu1')
@section('container')
<div class="container mt-4">
    <h2 class="mb-4">Listado de Pacientes</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Historia Clínica</th>
                <th>Tipo Doc</th>
                <th>N° Doc</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Sexo</th>
                <th>Fecha Nac.</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>medico</th>
                <th>codigocie</th>
                <th>descripcion_pais</th>
                <th>tipoepisodio</th>
                <th>ejecutar</th>
                <th>estado</th>

                {{-- Agrega más columnas si necesitas --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($minsaData as $data)
                <tr>
                    <td>{{ $data->historia_clinica }}</td>
                    <td>{{ $data->tipodoc }}</td>
                    <td>{{ $data->numdoc }}</td>
                    <td>{{ $data->apepat }}</td>
                    <td>{{ $data->apemat }}</td>
                    <td>{{ $data->nombres }}</td>
                    <td>{{ $data->sexo }}</td>
                    <td>{{ $data->fechanac }}</td>
                    <td>{{ $data->celular_res }}</td>
                    <td>{{ $data->direccion }}</td>
                    <td>{{ $data->medico }}</td>
                    <td>{{ $data->codigocie }}</td>
                    <td>{{ $data->descripcion_pais }}</td>
                    <td>{{ $data->tipoepisodio }}</td>
                    <td>
                {{-- {         <a href="{{ route('minsa.edit', $data->historia_clinica) }}" class="btn btn-sm btn-warning ">
}                    {{-- Agrega más columnas si necesitas --}}
                    {{-- Editar</a> --}}
                  
    {{-- </td>  --}}
    @if(isset($data->estado_envio) && $data->estado_envio == 1)
                    <span class="badge bg-success">No editable</span>
                @else
                    <a href="{{ route('minsa.edit', $data->historia_clinica) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>
                @endif
  <td>

                @if (isset($data->estado_envio) && $data->estado_envio == 1)
             <span class="badge  bg-primary">Enviado Exitosamente</span>
                    @else
             <span class="badge bg-danger">Pendiente Enviado</span>
                    @endif
                    </td>
    </tr>

    
            @endforeach
        </tbody>
    </table>

    {{-- Paginación si decides usarla en el futuro --}}
    {{-- {{ $minsaData->links() }} --}}
</div>
@endsection
