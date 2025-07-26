<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'materia_id', 'dia', 'hora_inicio', 'hora_fin', 'reserva_id'
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
