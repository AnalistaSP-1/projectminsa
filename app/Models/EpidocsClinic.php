<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EpidocsClinic extends Model
{
    use HasFactory;
    protected $table = 'epidocs_clinics';
    protected $fillable = [
        'doctor_id',
        'clinic_id',
    ];
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }
    public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id', 'id');
}

}
