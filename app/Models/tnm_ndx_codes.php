<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tnm_ndx_codes extends Model
{
    use HasFactory;
    protected $table = 'tnm_ndx_codes';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
