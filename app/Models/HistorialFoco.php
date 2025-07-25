<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    protected $guarded = [];

    public function foco()
    {
        return $this->belongsTo(Foco::class);
    }
}
