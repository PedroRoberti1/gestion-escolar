<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function ppff()
    {
        return $this->belongsTo(Ppff::class);
    }

    //este modelo pertenece a usuario...
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }
}
