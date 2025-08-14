<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nivel_of_education extends Model
{
    use HasFactory;
    protected $table = 'nivel_of_education';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
