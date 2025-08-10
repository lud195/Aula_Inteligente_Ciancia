<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['materia_id', 'docente_id', 'aula_id', 'dia', 'hora_inicio', 'hora_fin'];


    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docentes::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}