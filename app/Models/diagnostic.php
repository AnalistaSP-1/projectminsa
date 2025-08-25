<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnostic extends Model
{
    use HasFactory;
    protected $table = 'diagnostic';
    protected $primaryKey = 'code_class';
    public $timestamps = false;
}
