<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    

    protected $fillable = [
        'foco_id', 'fecha_cambio', 'hora_inicio', 'hora_fin', 'accion', 'estado'
    ];

    public function foco()
{
    return $this->belongsTo(Foco::class);
}

}
