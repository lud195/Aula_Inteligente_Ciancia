<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsoAire extends Model
{
    protected $guarded = [];

    public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class);
    }
}
