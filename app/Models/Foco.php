<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    protected $fillable = [
        'codigo', 'intensidad', 'tipo', 'estado', 'ubicacion', 'aula_id'
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function historiales()
{
    return $this->hasMany(HistorialFoco::class);
}

}
