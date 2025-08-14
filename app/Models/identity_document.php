<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identity_document extends Model
{
    use HasFactory;
    protected $table = 'identity_document';
    public $timestamps = false;
}
