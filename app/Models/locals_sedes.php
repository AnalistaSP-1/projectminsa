<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locals_sedes extends Model
{
    use HasFactory;
    protected $table = 'locals_sedes';
    public $timestamps = false;
    
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
