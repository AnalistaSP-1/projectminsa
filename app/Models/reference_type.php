<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference_type extends Model
{
    use HasFactory;
    protected $table = 'reference_type';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
