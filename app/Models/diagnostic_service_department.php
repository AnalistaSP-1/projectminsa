<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnostic_service_department extends Model
{
    use HasFactory;
    protected $table = 'diagnostic_service_department';
    public $timestamps = false;
    protected $fillable = [ 
            'codigo',
            'descripcion'
    ];
}

