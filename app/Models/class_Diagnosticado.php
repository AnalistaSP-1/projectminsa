<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_Diagnosticado extends Model
{
    use HasFactory;
    protected $table ='class_Diagnosticado';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
