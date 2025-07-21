<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    // Lista de campos que se pueden asignar masivamente
    protected $fillable = [
        'usuario_id',
        'tipo',
        'nombres',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'profesion',
        'foto',

    ];

    public function usuario()
    {
        // El modelo actual (Personal) pertenece a un usuario (User).
        return $this->belongsTo(User::class);
    }

    // un personal puede tener varias formaciones 
    public function formaciones()
    {
        return $this->hasMany(Formacion::class);
    }

}
