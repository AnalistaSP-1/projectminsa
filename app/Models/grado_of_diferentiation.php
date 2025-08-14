<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grado_of_diferentiation extends Model
{
    use HasFactory;
    protected $table = 'grado_of_diferentiation';
    public $timestamps = false;
    protected $fillable = [ 
        'codigo',
        'descripcion'
    ];
}
