<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class first_diasnosis_method extends Model
{
    use HasFactory;
    protected $table = 'first_diasnosis_method';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
