@extends('layouts.menu1')

@section('container')


        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif



            <div class="container mt-4">
                {{-- <h2>Editar Registro: {{ $data->historia_clinica }}</h2> --}}
<div class="container mt-4">
    <div class="card mb-4 shadow-sm">
<div class="card-header text-white" style="background-color: #4e175f;">Datos Personales Paciente</div>
        <div class="card-body">
            <form method="POST" action="{{ route('minsa.update', $data->historia_clinica) }}">
                @csrf
                @method('PUT')
                
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="historia_clinica" class="form-label">Historia Clínica</label>
                        <input type="text" id="historia_clinica" 
                            value="{{ old('historia_clinica', $data->historia_clinica) }}" 
                            class="form-control" readonly>
                    </div>

                    <div class="col-md-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" id="nombres" 
                            value="{{ old('nombres', $data->nombres) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="apepat" class="form-label">Apellido Paterno</label>
                        <input type="text" id="apepat" 
                            value="{{ old('apepat', $data->apepat) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="apemat" class="form-label">Apellido Materno</label>
                        <input type="text" id="apemat" 
                            value="{{ old('apemat', $data->apemat) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="numdoc" class="form-label">DNI</label>
                        <input type="text" id="numdoc" 
                            value="{{ old('numdoc', $data->numdoc) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="medico" class="form-label">CMP</label>
                        <input type="text" id="medico" 
                            value="{{ old('medico', $data->medico) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="tipodoc" class="form-label">Tipo Doc</label>
                        <input type="text" id="tipodoc" 
                            value="{{ old('tipodoc', $data->tipodoc) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="sexo" class="form-label">Sexo</label>
                        <input type="text" id="sexo" 
                            value="{{ old('sexo', $data->sexo) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="fechanac" class="form-label">Fecha Nacimiento</label>
                        <input type="text" id="fechanac" 
                            value="{{ old('fechanac', $data->fechanac) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="telefono_res" class="form-label">Teléfono</label>
                        <input type="text" id="telefono_res" 
                            value="{{ old('telefono_res', $data->telefono_res) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="celular_res" class="form-label">Celular</label>
                        <input type="text" id="celular_res" 
                            value="{{ old('celular_res', $data->celular_res) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" id="direccion" 
                            value="{{ old('direccion', $data->direccion) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="codigocie" class="form-label">Código CIE</label>
                        <input type="text" id="codigocie" 
                            value="{{ old('codigocie', $data->codigocie) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="codigo_pais" class="form-label">Código País</label>
                        <input type="text" id="codigo_pais" 
                            value="{{ old('codigo_pais', $data->codigo_pais) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="fecha_min" class="form-label">Fecha Primera Evaluación</label>
                        <input type="text" id="fecha_min" 
                            value="{{ old('fecha_min', $data->fecha_min) }}" 
                            class="form-control" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="fecha_max" class="form-label">Fecha Última Evaluación</label>
                        <input type="text" id="fecha_max" 
                            value="{{ old('fecha_max', $data->fecha_max) }}" 
                            class="form-control" disabled>
                    </div>
                </div>
           
        </div>
    </div>
</div>

 {{-- ===================== ACABA EL CARD DE  DATOS PERSONALES  ===================== --}}
        {{-- ===================== DATOS ADICIONALES ===================== --}}
 <div class="container mt-4">
{{-- <h2>Editar Registro: {{ $data->historia_clinica }}</h2> --}}
<div class="container mt-4">
    <div class="card mb-4 shadow-sm">
<div class="card-header text-white" style="background-color: #de7500;">Registrar</div>


        <div class="card-body">

        <div class="row g-3">
        <div class="col-md-3">
            <label for="class_Diagnosticado" class="form-label">CLASE DE CASO</label>
        <select name="class_Diagnosticado" id="class_Diagnosticado" class="form-control">
            <option value="">-- Seleccione --</option>
            @foreach($class_Diagnosticado as $item)
                <option value="{{ $item->code_class }}" 
                    {{ old('class_Diagnosticado', $data->code_class) == $item->code_class ? 'selected' : '' }}>
                    {{ $item->descripcion }}
                </option>
            @endforeach
        </select>
     </div>
                <!-- GRADO DE INSTRUCCIÓN -->

              <div class="col-md-3">
                <label for="nivel_of_education" class="form-label">GRADO DE INSTRUCCIÓN</label>
                <select name="nivel_of_education" id="nivel_of_education" class="form-control">
                    <option value="">-- Seleccione grado de instrucción --</option>
                    @foreach($nivel_of_education as $item)
                        <option value="{{ $item->codigo }}" {{ old('nivel_of_education', $data->nivel_of_education_codigo) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

                <div class="col-md-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <select name="ocupacion" id="ocupacion" class="form-control">
                    <option value="">-- Seleccione ocupación --</option>
                    @foreach($ocupaciones as $item)
                        <option value="{{ $item->codigo }}" {{ old('ocupacion', $data->ocupacion_codigo) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

         
         <div class="col-md-3">
                <label for="type_of_seguro" class="form-label">Tipo de Seguro</label>
                <select name="type_of_seguro" id="type_of_seguro" class="form-control">
                    <option value="">-- Seleccione tipo de seguro --</option>
                    @foreach($type_of_seguro as $item)
                        <option value="{{ $item->codigo }}" {{ old('type_of_seguro', $data->type_of_seguro) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }} 
                        </option>
                    @endforeach
                </select>
            </div>

       
           <div class="col-md-3">
                <label for="reference_type" class="form-label"></label>
                <select name="reference_type" id="reference_type" class="form-control">
                    <option value="">-- Tipo de Referencia --</option>
                    @foreach($reference_type as $item)
                        <option value="{{ $item->codigo }}" {{ old('reference_type', $data->reference_type) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
    

        {{-- ===================== CLASIFICACIÓN TNM ===================== --}}
                    <div class="col-md-3">
                <label for="tnm_tdx_codes" class="form-label"></label>
                <select name="tnm_tdx_codes" id="tnm_tdx_codes" class="form-control">
                    <option value="">-- Códigos TNM (TDx) --</option>
                    @foreach($tnm_tdx_codes as $item)
                        <option value="{{ $item->descripcion }}" 
                            {{ old('tnm_tdx_codes', $data->tnm_tdx_codes) == $item->descripcion ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>


                <div class="col-md-3">
        <label for="tnm_ndx_codes" class="form-label"></label>
        <select name="tnm_ndx_codes" id="tnm_ndx_codes" class="form-control">
            <option value="">-- Códigos NDX --</option>
            @foreach($tnm_ndx_codes as $item)
                <option value="{{ $item->descripcion }}"
                {{ old('tnm_ndx_codes', $data->tnm_ndx_codes) == $item->descripcion ? 'selected' : '' }}>
                {{ $item->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="col-md-3">
                    <label for="tnm_mdx_codes" class="form-label"></label>
                    <select name="tnm_mdx_codes" id="tnm_mdx_codes" class="form-control">
                        <option value="">-- Códigos MDX --</option>
                        @foreach($tnm_mdx_codes as $item)
                            <option value="{{ $item->descripcion }}" 
                            {{ old('tnm_mdx_codes', $data->tnm_mdx_codes) == $item->descripcion ? 'selected' : '' }}>
                                {{ $item->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                  <div class="col-md-3">
                    <label for="clinical_estudio" class="form-label"></label>
                    <select name="clinical_estudio" id="clinical_estudio" class="form-control">
                        <option value="">--  ESTADIO CLINICO --</option>
                        @foreach($clinical_estudio as $item)
                            <option value="{{ $item->codigo }}" {{ old('clinical_estudio', $data->clinical_estudio) == $item->codigo ? 'selected' : '' }}>
                                {{ $item->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
        


              <div class="col-md-3">
                <label for="case_status" class="form-label">Estado del Caso</label>
                <select name="case_status" id="case_status" class="form-control">
                    <option value="">-- Estado del caso --</option>
                    @foreach($case_status as $item)
                        <option value="{{ $item->codigo }}" {{ old('case_status', $data->case_status) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            
              
              <div class="col-md-3">
                <label for="cause_of_death" class="form-label">Causa de Muerte</label>
                <select name="cause_of_death" id="cause_of_death" class="form-control">
                    <option value="">-- Seleccione causa de muerte --</option>
                    @foreach($cause_of_death as $item)
                        <option value="{{ $item->codigo }}" {{ old('cause_of_death', $data->cause_of_death_codigo) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
      
  
              <div class="col-md-3">
            <label for="lugar_of_occurrence" class="form-label">Códigos Lugar de Ocurrencia</label>
            <select name="lugar_of_occurrence" id="lugar_of_occurrence" class="form-control">
                <option value="">-- Códigos Lugar de Ocurrencia --</option>
                @foreach($lugar_of_occurrence as $item)
                    <option value="{{ $item->codigo }}" {{ old('lugar_of_occurrence', $data->lugar_of_occurrence) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>


              <div class="col-md-3">
            <label for="first_diasnosis_method" class="form-label">METODO DEL PRIMER DIAGNOSTICO</label>
            <select name="first_diasnosis_method" id="first_diasnosis_method" class="form-control">
                <option value="">-- METODO DEL PRIMER DIAGNOSTICO--</option>
                @foreach($first_diasnosis_method as $item)
                    <option value="{{ $item->codigo }}" {{ old('first_diasnosis_method', $data->first_diasnosis_method) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
         </div>

      <div class="col-md-3">

            <label for="laterality" class="form-label">Códigos Lateridad</label>
            <select name="laterality" id="laterality" class="form-control">
                <option value="">-- Códigos Lateridad --</option>
                @foreach($laterality as $item)
                    <option value="{{ $item->codigo }}" {{ old('laterality', $data->laterality) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
     <div class="col-md-3">

            <label for="m_basic_ofdiagnosis" class="form-label"> METODO BASE DEL DIAGNOSTICO</label>
            <select name="m_basic_ofdiagnosis" id="m_basic_ofdiagnosis" class="form-control">
                <option value="">-- METODO BASE DEL DIAGNOSTICO --</option>
                @foreach($m_basic_ofdiagnosis as $item)
                    <option value="{{ $item->codigo }}" {{ old('m_basic_ofdiagnosis', $data->m_basic_ofdiagnosis) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

     <div class="col-md-3">
            <label for="m_basic_ofdiagnosis" class="form-label"> DEPARTAMENTO O SERVICIO QUE REALIZA EL DIAGNOSTICO</label>
            <select name="diagnostic_service_department" id="diagnostic_service_department" class="form-control">
                <option value="">-- DEPARTAMENTO O SERVICIO QUE REALIZA EL DIAGNOSTICO --</option>
                @foreach($diagnostic_service_department as $item)
                    <option value="{{ $item->codigo }}" {{ old('diagnostic_service_department', $data->diagnostic_service_department) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

   <div class="col-md-3">
            <label for="grado_of_diferentiation" class="form-label"> GRADO DE DIFERENCIACION</label>
            <select name="grado_of_diferentiation" id="grado_of_diferentiation" class="form-control">
                <option value="">-- GRADO DE DIFERENCIACION --</option>
                @foreach($grado_of_diferentiation as $item)
                    <option value="{{ $item->codigo }}" {{ old('grado_of_diferentiation', $data->grado_of_diferentiation) == $item->codigo ? 'selected' : '' }}>
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>


            
      <div class="col-md-3">
        <label for="fecha_papanicolau" class="form-label">Últ. Papanicolau</label>
        <input type="date" 
            name="fecha_papanicolau" 
            id="fecha_papanicolau" 
            class="form-control"
            value="{{ old('fecha_papanicolau', isset($data->fecha_ult_papanico) ? \Carbon\Carbon::parse($data->fecha_ult_papanico)->format('Y-m-d') : '') }}">
    </div>


   <div class="col-md-3">
        <label for="fecha_ult_mamo" class="form-label">Últ. Mamografía</label>
        <input type="date" 
            name="fecha_ult_mamo" 
            id="fecha_ult_mamo" 
            class="form-control"
            value="{{ old('fecha_ult_mamo', isset($data->fecha_ult_mamo) ? \Carbon\Carbon::parse($data->fecha_ult_mamo)->format('Y-m-d') : '') }}">
    </div>

          <div class="col-md-3">
        <label for="rec_vac_papiloma" class="form-label">VACUNA PAPILOMA</label>

        <select name="rec_vac_papiloma" id="rec_vac_papiloma" class="form-select" aria-label="Default select example">
            <option value="">-- Seleccione --</option>
            <option value="1" {{ old('rec_vac_papiloma', $data->rec_vac_papiloma ?? '') == "1" ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('rec_vac_papiloma', $data->rec_vac_papiloma ?? '') == "0" ? 'selected' : '' }}>No</option>
        </select>
           </div>
         <div class="col-md-3">
            <label for="temf_dias" class="form-label">Tiempo de enfermedad</label>
            <input type="text"
                    class="form-control"
                    id="temf_dias"
                    name="temf_dias" 
                    placeholder="Tiempo de enfermedad"
                    value="{{old('temf_dias', $data->temf_dias ?? '')}}">
        </div>
     
        {{-- 250825 --}}
<div class="col-md-3"> <!-- ahora sí, nueva columna -->
            <label for="diagnostico" class="form-label">Diagnóstico (CIE)</label>
            <select id="diagnostico" class="form-control"></select>
            <!-- Guardará la descripción -->
            <input type="hidden" name="dx_clinico" id="dx_clinico" value="{{ old('dx_clinico', $data->diagnostico_nombre ?? '') }}">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
     

{{-- 260823 0847 --}}

     <div class="col-md-3">
    <label for="topography" class="form-label">Código de topografía</label>
    <select id="topography" class="form-control"></select>
    <input type="hidden" name="cod_topo" id="cod_topo" value="{{ old('cod_topo', $data->cod_topo ?? '') }}">
</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    

{{-- 260825 1656 --}}


      <div class="col-md-3">
    <label for="morfologia" class="form-label">Seleccione morfologia</label>
    <select id="morfologia" class="form-control"></select>
    <input type="hidden" name="cod_morfo" id="cod_morfo" value="{{old('cod_morfo',$data->cod_morfo ?? '')}}">
    </div>
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ( $errors->all() as $error )
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          
        {{-- 270825 1656 --}}
   <div class="col-md-3">
            <label for="diag_histologico">diagnóstico histológico</label>
            <input type="text"
                    class="form-control"
                    id="diag_histologico"
                    name="diag_histologico" 
                    placeholder="ingresar diagnóstico histológico"
                    value="{{old('diag_histologico', $data->diag_histologico ?? '')}}"
                    >
        </div>


   <div class="col-md-3">
            <label for=" nro_anatomia_pato">Nro. Anatomía Patológica</label>
            <input type="text"
                    class="form-control"
                    id=" nro_anatomia_pato"
                    name=" nro_anatomia_pato" 
                    placeholder="ingresar anatomía patológica"
                    value="{{old('diag_histologico', $data->nro_anatomia_pato ?? '')}}"
                    >
        </div>


   <div class="col-md-3">
        <label for="fecha_exam_pato" class="form-label">fecha Exámen Patológico caritafeliz </label>
        <input type="date" 
            name="fecha_exam_pato" 
            id="fecha_exam_pato" 
            class="form-control"
            value="{{ old('fecha_exam_pato', isset($data->fecha_exam_pato) ? \Carbon\Carbon::parse($data->fecha_exam_pato)->format('Y-m-d') : '') }}">
    </div>



           <div class="col-md-3">
        <label for="tra_cir" class="form-label">Indicador Tratamiento Cirugía</label>

        <select name="tra_cir" id="tra_cir" class="form-select" aria-label="Default select example">
            <option value="">-- Seleccione --</option>
            <option value="1" {{ old('tra_cir', $data->tra_cir ?? '') == "1" ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('tra_cir', $data->tra_cir ?? '') == "0" ? 'selected' : '' }}>No</option>
        </select>

<div class="col-md-4 mb-3" id="campo-fecha" hidden>
        <label for="fecha_tra_cir" class="form-label">Fecha Tratamiento Cirugía</label>
        <input type="date" 
            name="fecha_tra_cir" 
            id="fecha_tra_cir" 
            class="form-control"
            value="{{ old('fecha_tra_cir', isset($data->fecha_tra_cir) ? \Carbon\Carbon::parse($data->fecha_tra_cir)->format('Y-m-d') : '') }}">
    </div>
<script>
    const select = document.getElementById('tra_cir');
    const campoFecha = document.getElementById('campo-fecha');

    const toggleFecha = () => campoFecha.hidden = (select.value !== "1");

    toggleFecha(); // Estado inicial
    select.addEventListener('change', toggleFecha);
</script>
</div>
        {{-- ===================== DIAGNÓSTICOS ===================== --}}

{{-- Indicador Tratamiento Medicina Nucelar --}}

   <div class="col-md-3">   
    <label for="tra_med_nuclear" class="form-label">Tratamiento Medicina Nuclear</label>
    <select name="tra_med_nuclear" id="tra_med_nuclear" class="form-select" aria-label="Default select example">
        <option value="">-- Seleccione --</option>
        <option value="1" {{ old('tra_med_nuclear', $data->tra_med_nuclear ?? '') == "1" ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('tra_med_nuclear', $data->tra_med_nuclear ?? '') == "0" ? 'selected' : '' }}>No</option>
    </select>
</div>

<div class="col-md-4 mb-3" id="campo-fecha-nuclear" hidden>
    <label for="fecha_tra_med_nuclear" class="form-label">Fecha Tratamiento Medicina Nuclear</label>
    <input type="date"
        name="fecha_tra_med_nuclear"
        id="fecha_tra_med_nuclear"
        class="form-control"
        value="{{ old('fecha_tra_med_nuclear', isset($data->fecha_tra_med_nuclear) ? \Carbon\Carbon::parse($data->fecha_tra_med_nuclear)->format('Y-m-d') : '') }}">
</div>
<script>
    const selectNuclear = document.getElementById('tra_med_nuclear');
    const campoFechaNuclear = document.getElementById('campo-fecha-nuclear');
    const toggleFechaNuclear = () => campoFechaNuclear.hidden = (selectNuclear.value !== "1");
    toggleFechaNuclear(); // Estado inicial
    selectNuclear.addEventListener('change', toggleFechaNuclear);
    </script>

{{-- 270825v3 --}}

 <div class="col-md-3">   
    <label for="tra_ter_bio" class="form-label">Tratamiento Terapia Biologica</label>
    <select name="tra_ter_bio" id="tra_ter_bio" class="form-select" aria-label="Default select example">
        <option value="">-- Seleccione --</option>
        <option value="1" {{ old('tra_ter_bio', $data->tra_ter_bio ?? '') == "1" ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('tra_ter_bio', $data->tra_ter_bio ?? '') == "0" ? 'selected' : '' }}>No</option>
    </select>
 </div>
<div class="col-md-4 mb-3" id="campo-fecha-biologico" hidden>
    <label for="fecha_tra_ter_bio" class="form-label">Fecha Tratamiento Terapia Biologica</label>
    <input type="date"
        name="fecha_tra_ter_bio"
        id="fecha_tra_ter_bio"
        class="form-control"
        value="{{ old('fecha_tra_ter_bio', isset($data->fecha_tra_ter_bio) ? \Carbon\Carbon::parse($data->fecha_tra_ter_bio)->format('Y-m-d') : '') }}">
</div>
<script>
    const selectTerapia = document.getElementById('tra_ter_bio');
    const campoFechaTerapia = document.getElementById('campo-fecha-biologico');
    const toggleFechaTerapia = () => campoFechaTerapia.hidden = (selectTerapia.value !== "1");
    toggleFechaTerapia(); // Estado inicial
    selectTerapia.addEventListener('change', toggleFechaTerapia);
    </script>

{{-- 270825v3.1 Indicador Tratamiento Radioterapia  --}}
<div class="col-md-3">   
    <label for="tra_rad" class="form-label">Tratamiento Radioterapia</label>
    <select name="tra_rad" id="tra_rad" class="form-select" aria-label="Default select example">
        <option value="">-- Seleccione --</option>
        <option value="1" {{ old('tra_rad', $data->tra_rad ?? '') == "1" ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('tra_rad', $data->tra_rad ?? '') == "0" ? 'selected' : '' }}>No</option>
    </select>
</div>

<div class="col-md-4 mb-3" id="campo-fecha-rad" hidden>
    <label for="fecha_tra_rad" class="form-label">Fecha Tratamiento Radioterapia</label>
    <input type="date"
        name="fecha_tra_rad"
        id="fecha_tra_rad"
        class="form-control"
        value="{{ old('fecha_tra_rad', isset($data->fecha_tra_rad) ? \Carbon\Carbon::parse($data->fecha_tra_rad)->format('Y-m-d') : '') }}">
</div>

<script>
    const selectRad = document.getElementById('tra_rad');
    const campoFechaRad = document.getElementById('campo-fecha-rad');

    const toggleFechaRad = () => campoFechaRad.hidden = (selectRad.value !== "1");

    toggleFechaRad(); // Estado inicial
    selectRad.addEventListener('change', toggleFechaRad);
</script>


        {{-- ===================== BOTONES ===================== --}}
        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success">Enviar datos</button>
                    <a href="{{ route('minsa-data.list') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
        @endsection
        @push('scripts')
        <script>
        $('#diagnostico').select2({
            ajax: {
                url: '/diagnostic/search',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return { q: params.term };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            },
            placeholder: 'Buscar diagnóstico',
            minimumInputLength: 2
        });

        // Cuando seleccionas un diagnóstico
        $('#diagnostico').on('select2:select', function (e) {
            var data = e.params.data;
            $('#dx_clinico').val(data.text); // descripción
            // si quieres guardar el código también, entonces:
            // $('#codigocie').val(data.id);
        });

        // Capturar el texto seleccionado y guardarlo en el hidden
        $('#diagnostico').on('select2:select', function (e) {
            var data = e.params.data;
            $('#dx_clinico').val(data.text); // Guardamos la descripción
        });
        </script>
        @endpush
    
        {{-- API2 --}}
        @push('scripts')
            <script>
        $('#topography').select2({
        ajax: {
            url:  '{{ url("api/topography/search") }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return {
                     results: data 
                    };
            },
        },
        placeholder: 'Buscar código topográfico',
        minimumInputLength: 2,
      
    });
 $('#topography').on('select2:select', function (e) {
            var data = e.params.data;
            $('#cod_topo').val(data.id); // descripción
            // si quieres guardar el código también, entonces:
            // $('#codigocie').val(data.id);
        });

        </script>
        @endpush


                {{-- API3 --}}
          @push('scripts')
<script>
    $('#morfologia').select2({
        ajax: {
            url: '{{ url("api/morfologia/search") }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        },
        placeholder: 'Buscar morfología',
        minimumInputLength: 2
    });

    $('#morfologia').on('select2:select', function (e) {
        var data = e.params.data;
        $('#cod_morfo').val(data.id); // descripción
        // Si quieres guardar el código también:
        // $('#codigocie').val(data.id);
    });
</script>
@endpush

