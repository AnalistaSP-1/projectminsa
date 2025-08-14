<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'name_short',
        'prefix',
        'email',
        'connection',
        'url_api',
        'active',
        'color'
    ];
//  public function clinic()
//     {
//         return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
//     }
    // public function schedules()
    // {
    //     return $this->hasMany(clinics_schedules::class, 'clinic_id');
    // }
    // public function childrens(){
    //     return $this->hasMany(clinic_building::class, 'clinic_id') ->where('active', '=', 1);
    // }
    // public function localsedes(){
    //     return $this->hasMany(locals_sedes::class, 'clinic_id');
    // }


public function users()
{
    return $this->belongsToMany(User::class, 'epidocs_clinics', 'clinic_id', 'doctor_id');

//     belongsToMany(
//     ModeloRelacionado::class,
//     'nombre_de_tabla_intermedia',
//     'clave_foranea_en_esta_tabla',
//     'clave_foranea_en_tabla_relacionada'
// )
}

    
}
