<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_of_seguro extends Model
{
    use HasFactory;
    protected $table = 'type_of_seguro';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
