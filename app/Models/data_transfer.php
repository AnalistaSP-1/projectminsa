<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_transfer extends Model
{
    use HasFactory;
    protected $table = 'data_transfer';
    public $timestamps = false;
    protected $fillable = [
    'fecha_pri_evaluacion',
    'histcli',
    'fecha_ult_control',
    'clase_caso',
    'tipodoc',
    'numdoc',
    'apepat',
    'apemat',
    'nombres',
    'sexo',
    'fechanac',
    'instruccion',
    'ocupacion',
    'condaseg',
    'pais',
    'ubigeo_nac',
    'ubigeo_res',
    'direccion',
    'telefono_res',
    'celular_res',
    'celular_contacto',
    'tipo_referencia',
    'eess_ref',
    'fecha_ult_papanico',
    'fecha_ult_mamo',
    'rec_vac_papiloma',
    'fecha_ref',
    'temf_dias',
    'dx_clinico',
    't',
    'n',
    'm',
    'estadio_cli',
    'fecha_incidencia',
    'metodo_pri_diag',
    'dept_servicio',
    'cod_topo',
    'cod_morfo',
    'grado_dif',
    'lateralidad',
    'base_diag',
    'diag_histologico',
    'nro_anatomia_pato',
    'fecha_exam_pato',
    'tra_cir',
    'fecha_tra_cir',
    'tra_med_nuclear',
    'fecha_tra_med_nuclear',
    'tra_ter_bio',
    'fecha_tra_ter_bio',
    'fecha_tra_rad',
    'tra_qui',
    'fecha_tra_qui',
    'tra_cui',
    'fecha_tra_cui',
    'tra_inmu',
    'fecha_tra_inmu',
    'tra_horm',
    'fecha_horm',
    'tra_ref',
    'tra_eess_ref',
    'fecha_tra_eess_ref',
    'tra_ninguno',
    'fecha_ini_tra',
    'fecha_cul_tra',
    'status',
    'causa_muerte',
    'lug_deceso',
    'fecha_defun',
    'causa_final',
    'causa_intermedia',
    'causa_basica',
    'medico',
    'fecha_min',
    'fecha_max',
    'codigocie',
    'codigo_pais',
    'descripcion_pais',
    'clinic_id',
    'tipoepisodio'


        
    ];
}
