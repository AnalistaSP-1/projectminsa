<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clinical_estudio extends Model
{
    use HasFactory;
    protected $table = 'clinical_estudio';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
