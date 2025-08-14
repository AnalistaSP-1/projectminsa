<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clinic_building extends Model
{
    use HasFactory;
    protected $table = 'clinic_building';
    public $timestamps = false;

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
//     public function shedules(){
//  return $this->hasMany(clinic_building_schedules::class, 'clinic_building_id', 'id');
//     }



}
