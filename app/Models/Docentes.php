<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $fillable = ['nombre', 'especialidad', 'correo'];

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class, 'docente_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'docente_id');
    }
}
