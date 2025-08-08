<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsoAire extends Model
{
    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'temperatura',
        'aire_acondicionado_id',  // <-- Agregar esta línea
    ];
}
