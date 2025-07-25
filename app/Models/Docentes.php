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
        // Agregamos el nombre correcto de la clave foránea (docente_id)
        return $this->hasMany(Disponibilidad::class, 'docente_id');
    }
}
