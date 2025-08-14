<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinsaData extends Model
{
    use HasFactory;
    protected $table = 'minsa_data';
    public $timestamps = false;

    protected $fillable = [
        'fecha_min',
        'historia_clinica',
        'fecha_max',
        'tipodoc',
        'numdoc',
        'apepat',
        'apemat',
        'nombres',
        'sexo',
        'fechanac',
        'pais',
        'direccion',
        'telefono_res',
        'celular_res',
        'celular_contacto',
        'codigocie',
        'codigo_pais',
        'descripcion_pais',
        'clinic_id',
        'tipoepisodio',
        'medico',
        'created_by'
    ];




}
