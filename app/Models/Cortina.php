<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cortina extends Model
{
    protected $guarded = [];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
