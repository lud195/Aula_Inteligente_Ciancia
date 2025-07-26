<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'disponibilidad',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function muebles()
    {
        return $this->hasMany(Mueble::class);
    }

    public function focos()
    {
        return $this->hasMany(Foco::class);
    }

    public function aireAcondicionado()
    {
        return $this->hasMany(AireAcondicionado::class);
    }

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class);
    }

}

