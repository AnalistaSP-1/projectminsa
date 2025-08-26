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
                <h2>Editar Registro: {{ $data->historia_clinica }}</h2>

            <form method="POST" action="{{ route('minsa.update', $data->historia_clinica) }}">
                    @csrf
                    @method('PUT') {{-- Para métodos PUT en Laravel --}}
                    <div class="row">

                        <div class="col-md-3 mb-3">
                            <label for="historia_clinica" class="form-label">Historia Clínica</label>
                            <input type="text" id="historia_clinica"
                value="{{ old('historia_clinica', $data->historia_clinica) }}"
                class="form-control" readonly>
                        </div>
                

                            <div class="col-md-3 mb-3">
                                <label for="nombres" class="form-label">Nombres</label>
                                <input type="text" id="nombres" value="{{ old('nombres', $data->nombres) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="apepat" class="form-label">Apellido Paterno</label>
                                <input type="text" id="apepat" value="{{ old('apepat', $data->apepat) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="apemat" class="form-label">Apellido Materno</label>
                                <input type="text" id="apemat" value="{{ old('apemat', $data->apemat) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="numdoc" class="form-label">DNI</label>
                                <input type="text" id="numdoc" value="{{ old('numdoc', $data->numdoc) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="medico" class="form-label">CMP</label>
                                <input type="text" id="medico" value="{{ old('medico', $data->medico) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="tipodoc" class="form-label">Tipo Doc</label>
                                <input type="text" id="tipodoc" value="{{ old('tipodoc', $data->tipodoc) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <input type="text" id="sexo" value="{{ old('sexo', $data->sexo) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="fechanac" class="form-label">Fecha Nacimiento</label>
                                <input type="text" id="fechanac" value="{{ old('fechanac', $data->fechanac) }}" class="form-control" disabled>
                            </div>


                <div class="col-md-3 mb-3">
                                <label for="telefono_res" class="form-label">Telefono</label>
                                <input type="text" id="telefono_res" value="{{ old('telefono_res', $data->telefono_res) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="celular_res" class="form-label">Celular</label>
                                <input type="text" id="celular_res" value="{{ old('celular_res', $data->celular_res) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" id="direccion" value="{{ old('direccion', $data->direccion) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="codigocie" class="form-label">Código CIE</label>
                                <input type="text" id="codigocie" value="{{ old('codigocie', $data->codigocie) }}" class="form-control" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="codigo_pais" class="form-label">Código País</label>
                                <input type="text" id="codigo_pais" value="{{ old('codigo_pais', $data->codigo_pais) }}" class="form-control" disabled>
                            </div>



                            <div class="col-md-3 mb-3">
                                <label for="codigo_pais" class="form-label">Fecha  Primera evaluacion</label>
                                <input type="text" id="codigo_pais" value="{{ old('codigo_pais', $data->fecha_min) }}" class="form-control" disabled>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label for="codigo_pais" class="form-label">Fecha  Ultima evaluacion</label>
                                <input type="text" id="codigo_pais" value="{{ old('codigo_pais', $data->fecha_max) }}" class="form-control" disabled>
                            </div>
                        </div>

        {{-- ===================== DATOS ADICIONALES ===================== --}}
                <div class="row">
            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
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

         

       

   

            <div class="col-md-4 mb-3">
                <label for="type_of_seguro" class="form-control">Tipo de Seguro</label>
                <select name="type_of_seguro" id="type_of_seguro" class="form-control">
                    <option value="">-- Seleccione tipo de seguro --</option>
                    @foreach($type_of_seguro as $item)
                        <option value="{{ $item->codigo }}" {{ old('type_of_seguro', $data->type_of_seguro) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }} 
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="reference_type" class="form-label">Tipo de Referencia</label>
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
                    <div class="col-md-4 mb-3">
                <label for="tnm_tdx_codes" class="form-label">Códigos TNM (TDx)</label>
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


                <div class="col-md-4 mb-3">
        <label for="tnm_ndx_codes" class="form-label">Códigos NDX</label>
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

                <div class="col-md-4 mb-3">
                    <label for="tnm_mdx_codes" class="form-label">Códigos MDX</label>
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

                <div class="col-md-3 mb-3">
                    <label for="clinical_estudio" class="form-label"> ESTADIO CLINICO</label>
                    <select name="clinical_estudio" id="clinical_estudio" class="form-control">
                        <option value="">--  ESTADIO CLINICO --</option>
                        @foreach($clinical_estudio as $item)
                            <option value="{{ $item->codigo }}" {{ old('clinical_estudio', $data->clinical_estudio) == $item->codigo ? 'selected' : '' }}>
                                {{ $item->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
        


                 <div class="col-md-4 mb-3">
                <label for="case_status" class="form-label">Estado del Caso</label>
                <select name="case_status" id="case_status" class="form-control">
                    <option value="">-- Seleccione estado del caso --</option>
                    @foreach($case_status as $item)
                        <option value="{{ $item->codigo }}" {{ old('case_status', $data->case_status) == $item->codigo ? 'selected' : '' }}>
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
               <div class="col-md-4 mb-3">
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
      
    <div class="col-md-3 mb-3">
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

            <div class="col-md-3 mb-3">
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

            <div class="col-md-3 mb-3">
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
       <div class="col-md-3 mb-3">
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


          <div class="col-md-3 mb-3">
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

    <div class="col-md-3 mb-3">
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


            
            <div class="col-md-3 mb-3">
        <label for="fecha_papanicolau" class="form-label">Últ. Papanicolau</label>
        <input type="date" 
            name="fecha_papanicolau" 
            id="fecha_papanicolau" 
            class="form-control"
            value="{{ old('fecha_papanicolau', isset($data->fecha_ult_papanico) ? \Carbon\Carbon::parse($data->fecha_ult_papanico)->format('Y-m-d') : '') }}">
    </div>


            <div class="col-md-3 mb-3">
        <label for="fecha_ult_mamo" class="form-label">Últ. Mamografía</label>
        <input type="date" 
            name="fecha_ult_mamo" 
            id="fecha_ult_mamo" 
            class="form-control"
            value="{{ old('fecha_ult_mamo', isset($data->fecha_ult_mamo) ? \Carbon\Carbon::parse($data->fecha_ult_mamo)->format('Y-m-d') : '') }}">
    </div>

        <div class="col-md-4 mb-3">
        <label for="rec_vac_papiloma" class="form-label">VACUNA PAPILOMA</label>

        <select name="rec_vac_papiloma" id="rec_vac_papiloma" class="form-select" aria-label="Default select example">
            <option value="">-- Seleccione --</option>
            <option value="1" {{ old('rec_vac_papiloma', $data->rec_vac_papiloma ?? '') == "1" ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('rec_vac_papiloma', $data->rec_vac_papiloma ?? '') == "0" ? 'selected' : '' }}>No</option>
        </select>

        <div class="col-md-4 mb-3">
            <label for="temf_dias">Tiempo de enfermedad</label>
            <input type="text"
                    class="form-control"
                    id="temf_dias"
                    name="temf_dias" 
                    placeholder="Tiempo de enfermedad"
                    value="{{old('temf_dias', $data->temf_dias ?? '')}}"
                    >
        </div>
        {{-- 250825 --}}
        <div class="col-md-6 mb-3">
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
        
  