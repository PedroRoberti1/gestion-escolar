<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{
    public function estudiante()
    {
        //una matriculacion perteneces a un solo estudiante
        return $this->belongsTo(Estudiante::class);
    }

    public function turno()
    {
        //Una matricula pertenece a un solo turno
        return $this->belongsTo(Turno::class);
    }

    public function gestion()
    {
        //Una matricula le pertenece a una sola gestion 
        return $this->belongsTo(Gestion::class);
    }
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function paralelo()
    {
        return $this->belongsTo(Paralelo::class);
    }

    
}
