<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    // Especifica el nombre de la tabla en la base de datos asociada a este modelo
    protected $table = 'materias';
    // Define los campos que se pueden asignar de forma masiva (mass assignment)
    protected $fillable = [
        'nombre'
    ];
}
