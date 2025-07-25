<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    protected $guarded = [];

    // Relación con aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    // Relación con historial de uso
    public function historialUsos()
    {
        return $this->hasMany(HistorialUsoAire::class);
    }
}
