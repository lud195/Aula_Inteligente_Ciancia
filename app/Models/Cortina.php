<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cortina extends Model
{
    protected $guarded = [];
    protected $fillable = ['aula_id', 'estado', 'nivel_cortina'];


    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
