<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class occupation extends Model
{
    use HasFactory;
    protected $table = 'occupation';
    public $timestamps = false;

    protected $fillable = [
'codigo',
'descripcion',
    ];
}
