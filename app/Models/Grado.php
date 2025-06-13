<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


//Clase modelo Grado que representa la tabla 'grados'
class Grado extends Model
{
    //Definde el nombre de la tabla asociada
    protected $table= 'grados';

    //Campos que se pueden asignar de forma masiva (mass assignment)
    protected $fillable = [

        'nombre', //nombre del grado
        'nivel_id',// Clave foranea hacia la tabla 'niveles';

    ];

    // Relacion: un grado pertenece a un nivel
    public function nivel(){
        return $this->belongsTo(Nivel::class);
    }
}
