<?php

//RELACION: Un persona puede tener varias formaciones y una formacion pertenece a un docente

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{

    protected $table= 'formacions';

    protected $fillable=[        
        'personal_id',
        'titulo',
        'institucion',
        'nivel',
        'ano_graduacion',
        'archivo',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }


}
