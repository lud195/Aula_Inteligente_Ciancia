<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $guarded = [];

    public function aula() {
        return $this->belongsTo(Aula::class);
    }

    // Cambiar Docente por Docentes
    public function docente() {
        return $this->belongsTo(Docentes::class);
    }

    public function materia() {
        return $this->belongsTo(Materia::class);
    }
}

