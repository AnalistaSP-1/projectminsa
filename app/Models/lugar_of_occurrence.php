<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugar_of_occurrence extends Model
{
    use HasFactory;
    protected $table = 'lugar_of_occurrence';
    public $timestamps = false; 
    protected $fillable = [
        'codigo',
        'descripcion',
    ];      
}
