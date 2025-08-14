<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laterality extends Model
{
    use HasFactory;
    protected $table = 'laterality';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
