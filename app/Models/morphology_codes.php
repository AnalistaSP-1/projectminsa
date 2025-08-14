<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class morphology_codes extends Model
{
    use HasFactory;
    protected $table = 'morphology_codes';
    public $timestamps = false;
}
