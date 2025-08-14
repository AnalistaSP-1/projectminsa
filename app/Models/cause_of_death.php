<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cause_of_death extends Model
{
    use HasFactory;
    protected $table = 'cause_of_death';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
