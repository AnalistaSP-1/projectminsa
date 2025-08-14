<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // nombre de la tabla en la base de datos

    protected $fillable = [
        'name', // o los campos que tenga tu tabla, por ejemplo 'slug', 'description'
    ];

    public $timestamps = false; // si tu tabla `roles` no tiene campos `created_at` y `updated_at`

    // Si quieres relacionarlo con usuarios
    public function users()
    {
  return $this->hasMany(User::class, 'role_id');
    }
}
