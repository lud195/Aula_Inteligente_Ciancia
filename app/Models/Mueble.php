<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    protected $fillable = [
        'aula_id', 'tipo', 'cantidad', 'estado', 'numero_inventario'
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
