<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $fillable = [
        'nombre',
        'gestion_id',
    ];

    // Define una relación de pertenencia con el modelo Gestion

    public function gestion()
    {
        // Esta función indica que el modelo actual, que seria periodo
        // pertenece a una instancia del modelo Gestion.
        // Laravel buscará una columna llamada 'gestion_id' en la tabla del modelo actual
        // y la usará para obtener el registro relacionado en la tabla 'gestions'.
        return $this->belongsTo(Gestion::class);
    }
}
