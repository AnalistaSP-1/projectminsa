<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupation;
use App\Models\MinsaData;
use App\Models\nivel_of_education;
use App\Http\Controllers\Controller; // ← ¡Importante!
use App\Models\case_status;
use App\Models\cause_of_death;
use App\Models\class_Diagnosticado;
use App\Models\type_of_seguro;
use App\Models\reference_type;  
use App\Models\tnm_tdx_codes;  
use App\Models\tnm_ndx_codes;  
use App\Models\tnm_mdx_codes;  
use App\Models\clinical_estudio;
use App\Models\DataTransfer;
use App\Models\lugar_of_occurrence;  
use App\Models\laterality;
use App\Models\first_diasnosis_method;
use App\Models\m_basic_ofdiagnosis;
use App\Models\diagnostic_service_department;   
use App\Models\grado_of_diferentiation;
use App\Models\diagnostic;
use Illuminate\Support\Facades\DB;

class MinsaDataController extends Controller
{
    public function index(Request $request)
    {
        //HOLA
        //  $minsaData = MinsaData::all();
        //     return view('Screen.List_minsa.mdata', compact('minsaData'));
        // $minsaData = DB::table('minsa_data as md')
        //     ->leftJoin('data_transfer as dt', 'md.histcli', '=', 'dt.histcli')
        //     ->select('md.*', 'dt.created_by')
        //     ->get();
//TU NO VALESSSSSSSSSSSSSSSSS JAAAAAAAAAAAAAA
    $idClinica = $request->session()->get('sedeId');
            if (!$idClinica) {
        return redirect()->route('login')
            ->withErrors(['sedeId' => 'No se seleccionó ninguna clínica.']);
    }

     $minsaData = MinsaData::Where('minsa_data.clinic_id', $idClinica)
                                   ->leftJoin('data_transfer', 'minsa_data.historia_clinica', '=', 'data_transfer.histcli')
                                ->leftJoin('users', 'data_transfer.created_by', '=', 'users.id')
                                ->select('minsa_data.*', 
                                DB::raw('CASE WHEN data_transfer.ID IS NULL THEN 0 ELSE 1 END as estado_envio'),
                                'users.name as nombre_usuario'
                                )
                                   ->orderBy('minsa_data.id', 'desc')
                                   ->get();                              //  ->get();
         return view('Screen.List_minsa.mdata', compact('minsaData'));

    }

 public function edit($historia_clinica){
    $data=MinsaData::where('historia_clinica',$historia_clinica)->firstOrFail();
    $ocupaciones = Occupation::all(); // <- Trae todas las ocupaciones
    $nivel_of_education = nivel_of_education::all(); // <- Trae todos los niveles de educación
    $case_status = case_status::all(); // <- Trae todos los niveles de educación
    $cause_of_death = cause_of_death::all(); // <- Trae todos los niveles de educación
    $class_Diagnosticado = class_Diagnosticado::all(); // <- Trae todos los niveles de educación
    $type_of_seguro = type_of_seguro::all(); // 
    $reference_type = reference_type::all(); // <- Trae todos los niveles de educación
    $tnm_tdx_codes = tnm_tdx_codes::all(); // <- Trae todos los niveles de educación
    $tnm_ndx_codes = tnm_ndx_codes::all(); // <- Trae todos los niveles de educación
    $tnm_mdx_codes = tnm_mdx_codes::all(); // <- Trae todos los niveles de educación
    $clinical_estudio = clinical_estudio::all(); // <- Trae todos los niveles de educación
    $lugar_of_occurrence = lugar_of_occurrence::all(); // <- Trae todos los niveles de educación
    $first_diasnosis_method = first_diasnosis_method::all(); // <- Trae todos los niveles de educación
    $laterality = laterality::all(); // <- Trae todos los niveles de educación
    $m_basic_ofdiagnosis = m_basic_ofdiagnosis::all(); // <- Trae todos los niveles de educación
    $diagnostic_service_department = diagnostic_service_department::all(); // <- Trae todos los niveles de educación
    $grado_of_diferentiation = grado_of_diferentiation::all(); // <- Trae todos los niveles de educación
    $diagnostic = diagnostic::all(); // <- Trae todos los niveles de educación
    
    return view('Screen.List_minsa.edit_form', 
     compact(
        'data',
        'ocupaciones',
        'nivel_of_education',
        'case_status',
        'cause_of_death',
        'class_Diagnosticado',
        'type_of_seguro',
        'reference_type',
        'tnm_tdx_codes',
        'tnm_ndx_codes',
        'tnm_mdx_codes',
        'clinical_estudio',
        'lugar_of_occurrence',
        'first_diasnosis_method',
        'laterality',
        'm_basic_ofdiagnosis',
        'diagnostic_service_department',
        'grado_of_diferentiation',
        'diagnostic',
    ));
 }
 
public function update(Request $request, $historia_clinica)
{
    $data = MinsaData::where('historia_clinica', $historia_clinica)
        ->orderBy('ID', 'DESC')
        ->first();

    if (!$data) {
        return redirect()->back()->with('error', 'No se encontró el registro en MinsaData');
    }
//EXAMPLER
    try {
        $mDatatransfer = new DataTransfer();
        $mDatatransfer->histcli = $data->historia_clinica;
        $mDatatransfer->apepat = $data->apepat;
        $mDatatransfer->apemat = $data->apemat;
        $mDatatransfer->nombres = $data->nombres;
        $mDatatransfer->tipodoc = $data->tipodoc;
        $mDatatransfer->numdoc = $data->numdoc;
        $mDatatransfer->sexo = $data->sexo;
        $mDatatransfer->celular_res = $data->celular_res;
        $mDatatransfer->telefono_res = $data->telefono_res;
        $mDatatransfer->medico = $data->medico;
        $mDatatransfer->pais = $data->codigo_pais;
        $mDatatransfer->direccion = $data->direccion;
        $mDatatransfer->fechanac = $data->fechanac;
        $mDatatransfer->condaseg = $request->type_of_seguro;
        $mDatatransfer->ocupacion = $request->ocupacion; 
        $mDatatransfer->instruccion = $request->nivel_of_education; 
        $mDatatransfer->clase_caso = $request->class_Diagnosticado; 
        $mDatatransfer->tipoepisodio = $request->tipoepisodio; 
        $mDatatransfer->tipo_referencia = $request->reference_type; 
        $mDatatransfer->t = $request->tnm_tdx_codes; 
        $mDatatransfer->n = $request->tnm_ndx_codes; 
        $mDatatransfer->m = $request->tnm_mdx_codes; 
        $mDatatransfer->estadio_cli = $request->clinical_estudio;
        $mDatatransfer->metodo_pri_diag= $request->first_diasnosis_method; 
        $mDatatransfer->dept_servicio = $request->diagnostic_service_department;
        $mDatatransfer->grado_dif = $request->grado_of_diferentiation;
        $mDatatransfer->lateralidad = $request->laterality;
        $mDatatransfer->base_diag = $request->m_basic_ofdiagnosis;
        $mDatatransfer->causa_muerte = $request->cause_of_death;
        $mDatatransfer->lug_deceso = $request->lugar_of_occurrence;
        $mDatatransfer->fecha_pri_evaluacion = $data->fecha_min;
        $mDatatransfer->fecha_ult_control = $data->fecha_max;
        $mDatatransfer->causa_muerte = $request->cause_of_death;
        $mDatatransfer->ubigeo_nac = $data->ubnc;
        //NUEVO 25082025
        $mDatatransfer->fecha_ult_papanico = $request->fecha_papanicolau;
        $mDatatransfer->fecha_ult_mamo = $request->fecha_ult_mamo;
        $mDatatransfer->rec_vac_papiloma = $request->rec_vac_papiloma;
        $mDatatransfer->temf_dias = $request->temf_dias;

        //NUEVO 250825 15:18
        $mDatatransfer->dx_clinico = $request->dx_clinico; // descripción

        //NUEVO 260825 08:49
$mDatatransfer->cod_topo = $request->cod_topo;
        //NUEVO 270825 08:21
$mDatatransfer->cod_morfo = $request->cod_morfo;


        $mDatatransfer->created_at = now(); 
        $mDatatransfer->created_by = auth()->id();
        $mDatatransfer->save();

        return redirect()->back()->with('success', '✅ Registro enviado correctamente');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', '❌ Ocurrió un problema al enviar el registro');
    }
}



}
// public function edit($historia_clinica)
// {
//     $data = MinsaData::where('historia_clinica', $historia_clinica)->firstOrFail();
//     return view('Screen.List_minsa.edit_form', compact('data'));
// }
