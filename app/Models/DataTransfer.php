<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransfer extends Model
{
    use HasFactory;
    
    protected $table = 'data_transfer';
    public $timestamps = false;
}
