<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre',
        'codigo',
        'carrera',
        'anio',
        'tipo_cursada',
        'docente_id',
    ];

    public function docente()
    {
        return $this->belongsTo(Docentes::class, 'docente_id');
    }
}
