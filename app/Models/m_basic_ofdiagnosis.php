<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_basic_ofdiagnosis extends Model
{
    use HasFactory;
    protected $table = 'm_basic_ofdiagnosis';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion',
    ];

}
 