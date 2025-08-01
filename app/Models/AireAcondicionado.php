<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    protected $fillable = ['aula_id', 'marca', 'modelo', 'estado', 'mantenimiento'];
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
