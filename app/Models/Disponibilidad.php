<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $guarded = [];

    protected $table = 'disponibilidades';

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docentes::class, 'docente_id');
    }
}
